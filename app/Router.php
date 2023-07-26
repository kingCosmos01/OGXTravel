<?php


    class Router {

        public function __construct() {

            $url = $this->GetUrl();
            
            if($url != null)
            {
                $this->GetView($url);

                if($url == 'logout')
                {
                    $this->Logout();
                }
            }

        }


        private function Logout()
        {
            session_destroy();
            unset($_SESSION['user']);
        }


        private function GetUrl()
        {
            if(isset($_GET['url']))
            {
                $url = $_GET['url'];
                $url = rtrim($url);

                return $url;
            }
        }

        private function GetView($view)
        {
            if($view != null)
            {
                $file = 'public/views/' . $view . '.php';

                if(file_exists($file))
                {
                    header('Location: http://localhost/lupertransportco/'.$file);
                }
                else
                {
                    header('Location: http://localhost/lupertransportco/');    
                }
            }
            else
            {
                return;
            }
        }
           

    }