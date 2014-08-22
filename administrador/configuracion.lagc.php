<?php
//*****************************************************************************************************
//*                  Este script permanece libre mientras estas lineas permanecen intactas
//*****************************************************************************************************
//Sistema desarrolldo por: Luis Gago - luisgago@lagc-peru.com
//Copyright (C) 2010 Luis Gago Casas
//-----------------------------------------------------------------------------------------------------
//Esta total mente prohibido cambiar la informacion del creador.
//Se permite crear componentes y modulos
//Cualquier pregunta a luisgago@lagc-peru.com
class LagcConfig {
    //Datos del Sitio
    var $lagcnombre = 'Lagc Perú';
    var $lagctitulo = 'Gestor de Sitios Web(CMS) - Lagc Perú';
    var $lagclema = 'El sitio de información para Socabaya - Arequipa';
    var $lagcmail = 'info@lagc-peru.com';
    var $lagcversion = 'MS44LjM=';
    var $lagcurl = 'http://localhost:8080/lagc/';
    //Mysql
    var $lagclocal = 'localhost';
    var $lagcbd = 'lagc';
    var $lagcuser = 'luisgago';
    var $lagcpass = '';
    //Sitio
    var $lagckeywords = 'por tu hermana, socabaya, ampliacion socabaya, campiña, el alto socabaya, pueblo tradicional socabaya, fotos socabaya, videos socabaya, la mansion, puente socabaya, turismo socabaya';
    var $lagcdescription = 'Por Tu Hermana, Pueblo tradicional de socabaya, arequipa, distrito de socabaya, fotos de socabaya, videos de socabaya, noticias de socabaya, humor en socabaya, canciones de socabaya, historia de socabaya, trabajo en socabaya, amigos en socabaya, colegios en socabaya, empresas en socabaya, comidas de socabaya';
    var $lagctipourl = '1';
    var $lagcactivo = '1';
    var $lagcactivmensaje = 'En un momento estaremos activando la pagina web Vuelva en unos momentos.';
    var $lagccompopri = '5';
    //Gestion de Contenidos
    var $lagctempladmin = 'lagc-peru';
    var $lagctemplsite = 'creatividad-digital';
    //Facebook
    var $lagcfbid = '109288145776036';
    var $lagcfbsecret = 'fac1a284d3be20cf5d1682304a59d548';
}
    $config = new LagcConfig();
    $con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
    mysql_select_db($config->lagcbd,$con) or die("<center>No hay conexion.</center>");
?>