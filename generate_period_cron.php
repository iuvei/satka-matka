<?php 
include_once 'common/session_db.php';

$time = 3;  //in min

$query = "select * from periods order by id desc";
$old_created_at = mysqli_query($conn, $query)->fetch_assoc()['created_at'];
//adding 3 minutes
$created_at = date('Y-m-d H:i:s', strtotime('+3 minutes', strtotime($old_created_at)));
           
$game_types = $db->select("game_types");
while($game_type = $game_types->fetch_assoc()){
    $game_types_id = $game_type['id'];
    $periods = $db->select("periods", "*", array("game_types_id"=>$game_type['id']), "id desc");
    
    if($periods->num_rows > 0){
        $period = $periods->fetch_assoc();
        // var_dump($game_type['id']);die;
        $period_id = $period['id'];
        
        // $datetime1 = new DateTime($period['created_at']);
        // $datetime2 = new DateTime(date("Y-m-d H:i:s"));
        // $interval = $datetime1->diff($datetime2);
        // $hours = $interval->format('%h');
        // $mins = $interval->format('%i');
        // $secs = $interval->format('%s');
        
        
        // Declare and define two dates
        $date1 = strtotime($period['created_at']); 
        $date2 = strtotime(date('Y-m-d H:i:s')); 
          
        // Formulate the Difference between two dates
        $diff = abs($date2 - $date1); 
        
        $years = floor($diff / (365*60*60*24));

        $months = floor(($diff - $years * 365*60*60*24)
                                       / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - 
                     $months*30*60*60*24)/ (60*60*24));
                     
        $hours = floor(($diff - $years * 365*60*60*24 
               - $months*30*60*60*24 - $days*60*60*24)
                                           / (60*60)); 
                                           
        $minutes = floor(($diff - $years * 365*60*60*24 
                 - $months*30*60*60*24 - $days*60*60*24 
                                  - $hours*60*60)/ 60); 
          
          
        $seconds = floor(($diff - $years * 365*60*60*24 
                 - $months*30*60*60*24 - $days*60*60*24
                        - $hours*60*60 - $minutes*60)); 
  
  
        
        if($minutes >= $time || ($minutes >= $time-1 && $seconds >= 30)){
            // if($minutes >= $time-1 && $seconds >= 30){
            //     $increased_sec = 60 - $seconds;
            //     $increased_sec = $increased_sec + 2;//because 2 second diffrence is accuring in client side
            //     $created_at = date("Y-m-d H:i:s", strtotime("+".$increased_sec." seconds"));
            // }else{
            //     $created_at = date("Y-m-d H:i:s");
            // }
            
            $period = $period['period'];
    
            $final_period = $period + 1;
            
            // First updating old result
            $price = $db->select("joinings", "sum(price) as total",array("periods_id"=>$period_id,"operatoroc"=>"and","game_types_id"=>$game_type['id']))->fetch_assoc()['total'];
            
            // find winning number
            
            $game_numbers = $db->select("game_numbers");
            $price_array = array();
            
            $number_profit = $db->select("game_rules", "profit", array("numbers"=>"any"))->fetch_assoc()['profit'];
            
            while($game_number = $game_numbers->fetch_assoc()){
                $final_price = 0;
                $number_price = 0;
                $game_number = $game_number['name'];
                // First direct number joinings
                $sql = "select sum(price) as total from joinings where (periods_id = $period_id and game_types_id = $game_types_id and number = $game_number)";
                $number_price = mysqli_query($conn, $sql)->fetch_assoc()['total'];
                $number_price = $number_price * $number_profit;
            
                $sql = "SELECT game_colors.name,game_rules.profit FROM game_rules JOIN game_colors on game_rules.game_colors_id = game_colors.id where CONCAT(',', numbers, ',') like '%,$game_number,%' ";
                
                $color_names = mysqli_query($conn, $sql);
                
                $color_profit = 0;
                
                while($color_name = $color_names->fetch_assoc()){
                    $color_price = 0;
                    $color = $color_name['name'];
                    $sql = "select sum(price) as total from joinings where (periods_id = $period_id and game_types_id = $game_types_id and color = '$color')";
                    $color_price = mysqli_query($conn, $sql)->fetch_assoc()['total'];
                    $color_profit += $color_price * $color_name['profit'];
                }
                
                $final_price = $color_profit + $number_price;
                
                // Assigning value
                $price_array[$game_number] = $final_price;
            }
            
            $winnig_number = array_search(min($price_array), $price_array);
            
            $sql = "select * from game_rules where CONCAT(',', numbers, ',') like '%,$winnig_number,%'";
            
            $winning_colors = mysqli_query($conn, $sql);
            $win_color = "";
            $counter = 0;
            while($winning_color = $winning_colors->fetch_assoc()){
                $color = $db->select("game_colors", "*", array("id"=>$winning_color['game_colors_id']))->fetch_assoc();
                if($counter == 0){
                   $win_color =  $color['name'];
                }else{
                    $win_color = $win_color.','. $color['name'];
                }
                
                $counter++;
            }
            
            $period_update_data = array("price"=>$price,"number"=>$winnig_number,"result"=>$win_color);
            
            $period_update = $db->update($period_update_data,"periods",$period_id);
            
            if($period_update[0] == 1){
                $period_insert_data = array("period"=>$final_period,"game_types_id"=>$game_type['id'],"created_at"=>$created_at);
                $period_insert = $db->insert($period_insert_data,"periods");
                var_dump($period_insert);
            }
        }else{
            echo "Period already generated Mins - $minutes <br>";
        }
    }
    else{
        $game_types = $db->select("game_types");
        while($game_type = $game_types->fetch_assoc()){
            $period_insert_data = array("period"=>1,"game_types_id"=>$game_type['id'],"created_at"=>date('Y-m-d H:i:s'));
            $period_insert = $db->insert($period_insert_data,"periods");
        }
        
    }
}
?>