<?php
/**
 * Paginator
 * @desc Ajax pagination class
 * @author Omar Abdallah
 * @license GPL
 * @version 1.5
 * @todo add SQL_CALC_FOUND_ROWS
 */

class AjaxPaginator{	
	/**
	 * total pages found for this query
	 * @var integer
	 */
	public $totalPages;
	/**
	 * 
	 * @var integer
	 */
	public $recordsPerPage ='10';
	/**
	 * Total records found from the query (without LIMIT)
	 * @var integer
	 */
	public $affected_rows;
	/**
	 * current page id
	 * @var integer
	 */
	public $pageId;
	/**
	 * the offset or the record to start from (used in the LIMIT clause)
	 * @var integer
	 */
	public $offset;
	/**
	 * The raw query submitted by the user
	 * @var string
	 */
	private $query;
	/**
	 * MySQLi connection Object
	 * @var object
	 */
	private $conn;
	/**
	 * mysqli_result object made for more flexibility
	 * for more info: http://us.php.net/manual/en/class.mysqli-result.php
	 * @var object
	 */
	public $result;
	/**
	 * the search query used in the like clause if it was specified
	 * @var string
	 */
	public $searchQuery='';
	/**
	 * fields to search in
	 * @var string | array
	 */
	public $fields='';
	
	/**
	 * How many links for the next and the previous
	 * @var integer
	 */
	public $linksCountLimit = 4;
	/**
	 * Debug variable
	 * @var bool
	 */
	public $debug=false;
	/**
	 * Group By clause
	 * @var string
	 */
	private $groupBy = '';
	/**
	 * Order By clause
	 * @var string
	 */
	private $orderBy = '';
	/**
	 * 
	 * @param $in_pageID id of the current page
	 * @param $in_recordsPerPage number of records per page
	 * @param $in_query SQL query
	 * @param $in_conn database connection object(mysqli)
	 * @return
	 */
	function __construct($in_pageID=1,$in_recordsPerPage,$in_query,$in_conn){
		$this->pageId = intval($in_pageID);
		$this->recordsPerPage = $in_recordsPerPage;
		$this->query = $in_query;		
		$this->conn = $in_conn;
		// order by position
		$orderbyPos = stripos($this->query,'ORDER BY');
		if($orderbyPos !== FALSE){
			$this->orderBy = " ". substr($this->query, $orderbyPos);
			$this->query = substr($this->query, 0, $orderbyPos);
		}
		// group by position
		$groupbyPos = stripos($this->query,'GROUP BY');
		if($groupbyPos !== FALSE){
			$this->groupBy = " ". substr($this->query,$groupbyPos);
			$this->query = substr($this->query,0,$groupbyPos);
		}
	}
	private function getAffectedRows(){
		if (! empty ( $this->searchQuery )) {
			$this->addSearch();
		}
		$result = $this->conn->query($this->query. $this->groupBy . $this->orderBy);
		if($result== FALSE){
			$err = 'Error: Cannot get affected rows';
			if($this->debug){
				$err .="<br /><b>Query: </b>". $this->query. $this->groupBy . $this->orderBy;
				$err .="<br /><b>Error: </b>". $this->conn->error;
			}
			throw new Exception($err);
		}	
		$affected_rows = $this->conn->affected_rows;
		return $affected_rows;
	}
	/**
	 * The Core function which does the actual pagination
	 * 
	 * @return array Associative array of rows returned
	 */
	public function paginate(){
		$this->offset = $this->getOffest();
		$this->affected_rows = $this->getAffectedRows();
		$this->totalPages = $this->getTotalPages();
        if($this->totalPages==0)$this->totalPages =1;		
        // construct the pagination query: in_query + groupby clause + order by clause + limit clause
		$pageQ = $this->query . $this->groupBy . $this->orderBy. " LIMIT " . $this->offset . " , " . $this->recordsPerPage . ";";
		if ($this->debug){
			echo $pageQ;
		}
		
		$this->result = $this->conn->query ( $pageQ );
		if ($this->result == false) {
			$err = 'Error: Cannot Execute Pagination Query';
			if($this->debug){
				$err .="<br /><b>Query</b>". $pageQ;
			}
			throw new Exception ( $err );
		}
		$rows  = array();
		while ( $row = $this->result->fetch_assoc () ) {
			$rows[] = $row;
		}	
		return $rows;
	}
	/**
	 * Add search capability by manipulating the SQL query to handle the like clause
	 * 
	 * @return 
	 */
	private function addSearch(){
		$this->searchQuery = $this->conn->real_escape_string ($this->searchQuery);
			if (is_array ($this->fields)) {
				$count = count ($this->fields);
				for($i = 0; $i<$count; $i++) {
					// its the first field we have to check for WHERE clause
					if ($i == 0) {
						if (stripos ( $this->query, 'WHERE' )) {
							$this->query .= " AND ({$this->fields[0]} like '$this->searchQuery%'";
						} else {
							$this->query .= " WHERE ({$this->fields[0]} like '$this->searchQuery%'";
						}
					}else{
						$this->query .= " OR {$this->fields[$i]} like '$this->searchQuery%'";
					}
				}
				$this->query .= ") ";
			} else {
				// if only single field to search in
				if (stripos ( $this->query, 'where' )) {
					$this->query .= " AND name like '$this->searchQuery%'";
				} else {
					$this->query .= " WHERE name like '$this->searchQuery%'";
				}
			}
	}
	/**
	 * Gets the offset(start number of the LIMIT clause)
	 *
	 * @return string $offset 
	 */
	private function getOffest(){
		// multiply id with no_items_per_page
		$offset = ($this->pageId - 1) * $this->recordsPerPage;
		return $offset;
	}
	/**
	 * Get's the number of pages required to display the result
	 *
	 * @return string $totalPages
	 */
	public function getTotalPages(){
		// return the float to higher integer ex:4.5 to 5,3.2 to 4
		$totalPages= ceil($this->affected_rows/$this->recordsPerPage);	
		return $totalPages;
	}
	/**
	 * Generates the pagination links at the bottom of the page
	 * @param $class css class that will be added to the <a> tag
	 * @return string
	 */
	public function getLinks($class = "") {
		$output = '';
		// if the current page is not the first
		if ($this->pageId > 1) {
			$count = 1;
			for($i = $this->pageId; $i >= 1; $i --) {
				if ($count > $this->linksCountLimit)
					break;
				if ($i == $this->pageId)
					continue;
				$output = "<a id='{$i}' class='{$class}'>{$i}</a>\r\n" . $output;
				$count ++;
			}
			
			//previous page link
			$prevPage = $this->pageId - 1;
			$output = "<a id='{$prevPage}' class='" 
			. $class . "'>Atras</a>\r\n" . $output;
			if ($prevPage > 1){
				// first page link
				$output = "<a id='1' class='" . $class 
				. "'>Primero</a>\r\n" . $output;
			}	
		}
		$output .= "<span class='thispage'>{$this->pageId}</span>\r\n";
		// next pages
		$count = 1;
		for($i = $this->pageId; $i < $this->totalPages; $i ++) {
			if ($count > $this->linksCountLimit)
				break;
			if ($i == $this->pageId)
				continue;
			$output .= "<a id='{$i}' 
				 class='{$class}'>{$i}</a>\r\n";
			$count ++;
		}
		// next and last links
		if ($this->pageId < $this->totalPages) {
			// next link
			$next = $this->pageId + 1;
			$output .= "<a id='{$next}' class='{$class}'>Siguiente</a>\r\n";
			if ($this->totalPages != $next){
				// last page link
				$output .= "<a id='{$this->totalPages}' class='{$class}'>Ultimo</a>\r\n";
			}	
		}
		return $output;
	}
}
?>