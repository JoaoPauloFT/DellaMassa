<?php
    class config {
        private $hia;
        private $hta;
        private $hij;
        private $htj;

        public function setHia($hia) {
            $this->hia = $hia;
        }

        public function setHta($hta) {
            $this->hta = $hta;
        }
        
        public function setHij($hij) {
            $this->hij = $hij;
        }

        public function setHtj($htj) {
            $this->htj = $htj;
        }

        public function getHia() {
            return $this->hia;
        }

        public function getHta() {
            return $this->hta;
        }

        public function getHij() {
            return $this->hij;
        }

        public function getHtj() {
            return $this->htj;
        }

    }
?>