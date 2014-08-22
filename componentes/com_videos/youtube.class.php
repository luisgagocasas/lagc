<?php
/*
 * Name: Simple Class YouTube
 * Description: Get Information of YouTube video
 * Development: Guido F. Robertone
 * Site: http://www.zarpele.com.ar
 * License: GNU GENERAL PUBLIC LICENSE (http://www.gnu.org/licenses/gpl.html)
 * Version: 1.0
 */

class Youtube
{
    var $data = '';
    var $xml = '';
    var $id = '';

    private function youtubeCurl($url){
        $browser_id = 'none';
        $curl_handle = curl_init();
        $options = array
        (
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => $browser_id
        );
        curl_setopt_array($curl_handle, $options);
        $server_output = curl_exec($curl_handle);
        curl_close($curl_handle);
        return $server_output;
    }

    public function __construct($id)
    {
        if (strlen($id) >= 22)
        {
            parse_str( parse_url( $id, PHP_URL_QUERY ) );
            $this->id = $v;
        }
        else
        {
            $this->id = $id;
        }

        $url = 'http://gdata.youtube.com/feeds/videos/' . $this->id;
        $server_output = $this->youtubeCurl($url);

        if($server_output == 'Invalid id'){
            return false;
        }else{
            $this->data = $server_output;
            $description = $this->prepareDescription();
            $this->xml = new SimpleXMLElement($this->data);
            $this->xml->addChild('description', $description);
            return true;
        }
    }

    public function getData(){
        return $this->data;
    }

    public function getXml(){
        return $this->xml;
    }

    public function valid(){
        if(empty($this->data)){
            return false;
        }else{
            return true;
        }
    }

    /* DATA VIDEO */
    public function getTitle(){
        if ($this->valid()){
            return $this->xml->title;
        }else{
            return false;
        }
    }

    public function getPublished()
    {
        if ($this->valid()){
            return $this->xml->published;
        }else{
            return false;
        }
    }

    public function getUpdated()
    {
        if ($this->valid()){
            return $this->xml->updated;
        }else{
            return false;
        }
    }

    public function getCategory()
    {
        if ($this->valid()){
            $category = '';
            for ($i = 0; $i < count($this->xml->category);$i++){
                if ($this->xml->category[$i]['scheme'] == 'http://gdata.youtube.com/schemas/2007/categories.cat'){
                    $category = $this->xml->category[$i]['label'];
                    break;
                }
            }
            return $category;
        }else{
            return false;
        }
    }

    public function getTags(){
        if ($this->valid()){
            $tags = array();
            for ($i = 0; $i < count($this->xml->category);$i++){
                if ($this->xml->category[$i]['scheme'] == 'http://gdata.youtube.com/schemas/2007/keywords.cat'){
                    $name = $this->xml->category[$i]['term'];
                    array_push($tags, $name);
                }
            }
            return $tags;
        }else{
            return false;
        }
    }

    public function getContent()
    {
        if ($this->valid()){
            return $this->xml->content;
        }else{
            return false;
        }
    }

    public function getDescription()
    {
        if ($this->valid()){
            return $this->xml->description;
        }else{
            return false;
        }
   }

    private function prepareDescription()
    {
        $startString = "<media:description type='plain'>";
        $endString = "</media:description>";

        $starLocation = strpos($this->data, $startString);
        $tempString = substr($this->data, $starLocation);

        $endLocation = strpos($tempString, $endString);
        $description = substr($tempString, 0, $endLocation);

        if (empty($description))
        {
            $description=false;
        }
        else
        {
            $description = substr($description,strlen($startString));
        }

        return $description;
    }

    public function getUrl()
    {
        if ($this->valid()){
            return 'http://www.youtube.com/watch?v='.$this->id;
        }else{
            return false;
        }
    }

    public function getImageUrl($option)
    {
        if ($this->valid()){
            if($option == 'default'){
            return 'http://i.ytimg.com/vi/'.$this->id.'/default.jpg';
            }
            if($option == 0){
                return 'http://i.ytimg.com/vi/'.$this->id.'/0.jpg';
            }
            if($option == 1){
                return 'http://i.ytimg.com/vi/'.$this->id.'/1.jpg';
            }
            if($option == 2){
                return 'http://i.ytimg.com/vi/'.$this->id.'/2.jpg';
            }
            if($option == 3){
                return 'http://i.ytimg.com/vi/'.$this->id.'/3.jpg';
            }
        }else{
            return false;
        }
    }

    /* AUTHOR MEHTODS */
    public function getAuthorName(){
        if ($this->valid()){
            return $this->xml->author->name;
        }else{
            return false;
        }
    }

    public function getAuthorUrl(){
        if ($this->valid()){
            return 'http://www.youtube.com/user/'.$this->getAuthorName();
        }else{
            return false;
        }
    }

    public function getAuthorUri(){
        if ($this->valid()){
            return $this->xml->author->uri;
        }else{
            return false;
        }
    }

    /* see: http://code.google.com/apis/youtube/player_parameters.html */
    public function getEmbeb($options = NULL)
    {
        $width = $options['width'];
        if (!isset($options['width'])){
            $width = 425;
        } //Width
        unset($options['width']);

        $height = $options['height'];
        if (!isset($options['height'])){
            $height = 349;
        } //Height
        unset($options['height']);
        
        $secure = '';
        if (isset($options['https'])){
            if ($options['https'] == 1){
                $secure = 's';
                unset($options['https']);
            }else{
                $secure = '';
                unset($options['https']);
            }
        }

        if(empty($options)){
            $exclamation = '"';
        }else{
            $exclamation = '?';
        }
        
        $embeb_code = '<iframe class="youtube-player" type="text/html" width="'.$width.'" height="'.$height.'" src="http'.$secure.'://www.youtube.com/embed/'.$this->id.$exclamation;

        $i = 1;
        foreach($options as $key => $value){
            if($i == count($options)){
                $embeb_code .= $key.'='.$value.'"';
            }else{
                $embeb_code .= $key.'='.$value.'&';
            }
            $i++;
        }
        $embeb_code .= '></iframe>';

        return $embeb_code;
    }
}

?>
