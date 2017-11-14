<?php
	class DB{
		public function con(){
			$db = new mysqli("127.0.0.1", "mdrifatu_user", "rifatdoly25", "mdrifatu_taqwa");
			return $db;
		}
        
        public function query($q){
         $result = self::con()->query($q);
            return $result;
        }
	}
?>