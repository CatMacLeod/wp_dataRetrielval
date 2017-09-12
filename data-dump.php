<?php
/*
    GetData() uses a try/catch block to enforce proper error handling, 
    and retrieves the species classifications.
*/

    function getData(){
        include 'db_connection.php';
        $species = [];

        try {
            
            $sql = "SELECT f.family_name AS family, g.genus_name AS genus, s.species_name AS species
                    FROM Species s 
                    JOIN Genus g ON s.genus_name = g.genus_name
                    JOIN Families f ON f.family_name = g.family_name
                    ORDER BY f.family_name, g.genus_name, s.species_name
                    desc";
            $result = mysqli_query($con,$sql);

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($species, $row);
            }
            
        } catch(Exception $e) {
            echo $e->getMessage();
        } finally {
            if($con != NULL){
                mysqli_close($con);
            } 
        }

        return $species;
    };

    function makeTable(){
        $taxonomy = getData();

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Family</th>";
        echo "<th>Genus</th>";
        echo "<th>Species</th>";
        echo "</tr>";

        foreach($taxonomy as $item){
            echo "<tr>";
            echo "<td>${item['family']}</td>";
            echo "<td>${item['genus']}</td>";
            echo "<td>${item['species']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

?>