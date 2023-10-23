<?php 

    function routesURL(){
        if(isset( $_GET["url"])){
            $url = $_GET["url"] ? $_GET["url"] : "home";
        }else{
            $url = "home";
        }
        switch($url){
            case 'home':
                
               include_once('./portal/home.php'); 
            break;
            case 'quizz':
                
                include_once('./portal/quizz.php'); 
             break;
             case 'creditos':
               
                include_once('./portal/credits.php'); 
             break;
             case 'login':
                include_once('./portal/login.php'); 
             break;
             case 'adduser':
               include_once('./portal/adduser.php'); 
            break;
             case 'noticia':
                include_once('./portal/noticia.php'); 
             break;
             case 'logout':
                include_once('./essencials/logout.php'); 
             break;
             case 'tools':
               include_once('./portal/tools.php'); 
            break;
            case 'edit_home':
               include_once('./portal/edit_home.php'); 
            break;
            case 'users':
               include_once('./portal/users.php'); 
            break;
            case 'comments':
               include_once('./portal/comments.php'); 
            break;
            case 'results_adm':
               include_once('./portal/results_adm.php'); 
            break;
            case 'comments_adm':
               include_once('./portal/comments_adm.php'); 
            break;
            case 'excluir_coment':
               include_once('./portal/excluir_coment.php'); 
            break;
            case 'excluir_result':
               include_once('./portal/excluir_result.php'); 
            break;
            case 'excluir_usuario':
               include_once('./portal/excluir_usuario.php'); 
            break;
             case 'insert':
                include_once('./private/inserir.php'); 
             break;
             case 'editar_post':
               
                include_once('./private/editar_post.php'); 
             break;
             case 'excluir_post':
                include_once('./private/excluir_post.php'); 
             break;


            default: 
            include_once('./portal/404.php');
            break;
        }
    }
?>