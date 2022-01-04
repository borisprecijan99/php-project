<?php
    class Game {
        private $id;
        private $title;
        private $releaseDate;
        private $developer;
        private $publisher;
        private $genres;
        private $price;
        private $imageUrl;
        private $description;
        private $status;

        public function __construct($id, $title, $releaseDate, $developer, $publisher, $genres, $price, $imageUrl, $description) {
            $this->id = $id;
            $this->title = $title;
            $this->releaseDate = date("j M, Y", strtotime($releaseDate));
            $this->developer = $developer;
            $this->publisher = $publisher;
            $this->genres = explode(",", $genres);
            for ($i = 0; $i < count($this->genres); $i++) {
                $this->genres[$i] = trim($this->genres[$i]);
            }
            $this->price = number_format($price, 2);
            $this->imageUrl = $imageUrl;
            $this->description = $description;
        }

        public function getHtmlForHomePage() {
            $result = "";
            $result .= "<div class=\"col\">";
            $result .= "<form action=\"game_details.php\" method=\"post\">";
            $result .= "<input type=\"hidden\" name=\"id\" value=\"$this->id\">";
            $result .= "<input type=\"hidden\" name=\"status\" value=\"$this->status\">";
            $result .= "<div class=\"card h-100 store-item\">";
            $result .= "<button type=\"submit\" class=\"btn p-0 text-reset\">";
            $result .= "<img src=\"$this->imageUrl\" class=\"card-img-top\">";
            $result .= "<div class=\"card-body\">";
            $result .= "<h6 class=\"card-title center\">$this->title</h6>";
            $result .= "</div>";
            $price = "";
            if ($this->price == 0) {
                $price = "FREE";
            } else {
                $price = $this->price . "€";
            }
            $result .= "<div class=\"card-footer text-success center\">$price</div>";
            $result .= "</button>";
            $result .= "</div>";
            $result .= "</form>";
            $result .= "</div>";
            return $result;
        }

        public function getHtmlForGameDetailsPage() {
            $result = "";
            $result .= "<div class=\"card m-3 store-item\">";
            $result .= "<div class=\"row g-0\">";
            $result .= "<div class=\"col-md-4 center\">";
            $result .= "<img width=\"600\" src=\"$this->imageUrl\" class=\"img-fluid rounded-start\">";
            $result .= "</div>";
            $result .= "<div class=\"col-md-8\">";
            $result .= "<div class=\"card-body\">";
            $result .= "<h3 class=\"card-title center\">$this->title</h3>";
            $result .= "<table class=\"table table-borderless text-reset\">";
            $result .= "<tr>";
            $result .= "<td><b>RELEASE DATE:</b></td>";
            $result .= "<td>$this->releaseDate</td>";
            $result .= "</tr>";
            $result .= "<tr>";
            $result .= "<td><b>DEVELOPER:</b></td>";
            $result .= "<td>$this->developer</td>";
            $result .= "</tr>";
            $result .= "<tr>";
            $result .= "<td><b>PUBLISHER:</b></td>";
            $result .= "<td>$this->publisher</td>";
            $result .= "</tr>";
            $result .= "<tr>";
            $result .= "<td><b>GENRES:</b></td>";
            $result .= "<td>";
            foreach ($this->genres as $genre) {
                $result .= "<span class=\"store-menu p-1 me-1\">$genre</span>";
            }
            $result .= "</td>";
            $result .= "</tr>";
            $result .= "</table>";
            $result .= "<div class=\"center\">";
            $result .= "<form action=\"game_details.php\" method=\"post\" class=\"bg-dark center p-2 add-to-cart-button\">";
            $result .= "<input type=\"hidden\" name=\"id\" value=\"$this->id\">";
            $result .= "<input type=\"hidden\" name=\"status\" value=\"$this->status\">";
            $result .= "<input type=\"hidden\" name=\"add\">";
            $price = "";
            if ($this->price == 0) {
                $price = "FREE";
            } else {
                $price = $this->price . "€";
            }
            $result .= "<span class=\"pe-3 text-success\">$price</span>";
            if ($this->status == "IN LIBRARY") {
                $result .= "<button disabled class=\"btn btn-success ps-4 pe-4\">In Library</button>";
            } else if ($this->status == "IN CART") {
                $result .= "<button disabled class=\"btn btn-success ps-4 pe-4\">In Cart</button>";
            } else if ($this->status == "NOT IN CART") {
                $result .= "<button class=\"btn btn-success ps-4 pe-4\" type=\"submit\">Add to Cart</button>";
            }
            $result .= "</form>";
            $result .= "</div>";
            $result .= "</div>";
            $result .= "</div>";
            $result .= "</div>";
            $result .= "<div class=\"row g-0\">";
            $result .= "<h7 class=\"center pt-4 pb-3\"><b>ABOUT THIS GAME</b></h7>";
            $result .= "<p class=\"ps-4 pe-4 justify\">$this->description</p>";
            $result .= "</div>";
            $result .= "</div>";
            return $result;
        }

        public function getHtmlForLibraryPage() {
            $result = "";
            $result .= "<tr>";
            $result .= "<td><img width=\"100\" src=\"$this->imageUrl\"></td>";
            $result .= "<td>$this->title</td>";
            $result .= "</tr>";
            return $result;
        }

        public function getHtmlForCartPage() {
            $result = "";
            $result .= "<tr>";
            $result .= "<td><img width=\"100\" src=\"$this->imageUrl\"></td>";
            $result .= "<td>$this->title</td>";
            $price = "";
            if ($this->price == 0) {
                $price = "FREE";
            } else {
                $price = $this->price . "€";
            }
            $result .= "<td class=\"text-success\">$price</td>";
            $result .= "</tr>";
            return $result;
        }

        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getReleaseDate() {
            return $this->releaseDate;
        }

        public function getPublisher() {
            return $this->publisher;
        }

        public function getDeveloper() {
            return $this->developer;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getGenres() {
            return $this->genres;
        }

        public function getPrice() {
            return $this->price;
        }

        public function getImageUrl() {
            return $this->imageUrl;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getStatus() {
            return $this->status;
        }
    }
?>