<?php 
$conn = new mysqli('localhost','root','','gemstone_db');
$sql = "select * from gemstones";
$res = $conn->query($sql);
$gems = [];
while ($row = $res->fetch_assoc()) {
    array_push($gems,$row);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form id="findGemsForm" action="" method="post">
        <h2>Gem Identification</h2>
        <div class="lab">
            <label>Minimum Refractive Index:</label>
            <input id="min_ref" step="0.001" type="number" name="minimumRefractiveIndex" required>
        </div>
        <div class="lab">
            <label>Maximum Refractive Index:</label>
            <input id="max_ref" step="0.001" type="number" name="maximumRefractiveIndex">
        </div>
        <div class="lab">
            <label>Double Refraction:</label>
            <input id="dbl_ref" step="0.001" type="number" name="doublerefraction">
        </div>
        <div class="lab">
            <label>Density:</label>
            <input id="density" step="0.001" type="number" name="density">
        </div>
        <div class="lab">
            <label>Hardness:</label>
            <input id="hardness" step="0.001" type="number" name="hardness">
        </div>
        <div class="lab">
            <label>Color:</label>
            <select id="color">
                <option value="" selected>Select Color</option>
                <option value="red">Red</option>
                <option value="pink">Pink</option>
                <option value="orange">Orange</option>
                <option value="blue">Blue</option>
                <option value="violet">Violet</option>
                <option value="chatoyant">Chatoyant</option>
                <option value="green">Green</option>
                <option value="colorless">Colorless</option>
                <option value="brown">Brown</option>
                <option value="purple">Purple</option>
            </select>
        </div>
        <div id="btn">
            <button type="submit">Find</button>
        </div>
        <div id="ta">
            <h5 id="output" align="left">Possible Gem stones</h5>
            <div id="outputBox"><small>Search..</small></div>
        </div>
    </form>
    <p id="gems" style="display: none;"><?php echo json_encode($gems) ?></p>
</body>
<script type="text/javascript">
    const gems = JSON.parse(document.getElementById("gems").innerText);
    const form = document.getElementById("findGemsForm");
    const output = document.getElementById("outputBox");
console.log(gems)
    //fields
    let min_ref_field = document.getElementById("min_ref");
    let max_ref_field = document.getElementById("max_ref");
    let dbl_ref_field = document.getElementById("dbl_ref");
    let density_field = document.getElementById("density");
    let hardness_field = document.getElementById("hardness");
    let color_field = document.getElementById("color");

    form.addEventListener('submit',(e)=>{
        e.preventDefault();
        output.innerHTML = "";

        //assign values
        min_ref_field.value  != '' ? min_ref  = min_ref_field.value : min_ref = 0;
        max_ref_field.value  != '' ? max_ref  = max_ref_field.value : max_ref = 0;
        dbl_ref_field.value  != '' ? dbl_ref  = dbl_ref_field.value : dbl_ref = 0;
        density_field.value  != '' ? density  = density_field.value : density = 0;
        hardness_field.value != '' ? hardness = hardness_field.value : hardness = 0;
        color_field.value    != '' ? color    = color_field.value : color = 0;

        var result = [];

        function search(gem){

            if(max_ref == 0){

                if(min_ref != 0 && dbl_ref == 0 && density == 0 && hardness == 0 && color == 0){
                    if(min_ref == gem.Refractive_Index_Start && min_ref == gem.Refractive_Index_End){
                        result.push(gem)
                        return 1;
                    }
                }
                else if (min_ref != 0 && dbl_ref != 0 && density == 0 && hardness == 0 && color == 0){
                    if(min_ref == gem.Refractive_Index_Start && min_ref == gem.Refractive_Index_End && dbl_ref >= gem.DRefraction_Start && dbl_ref <= gem.DRefraction_End){
                        result.push(gem)
                        return 1;
                    }
                }
                else if (min_ref != 0 && dbl_ref != 0 && density != 0 && hardness == 0 && color == 0){
                    if(min_ref == gem.Refractive_Index_Start && min_ref == gem.Refractive_Index_End  && dbl_ref >= gem.DRefraction_Start && dbl_ref <= gem.DRefraction_End
                    && density >= gem.Density_Start && density <= gem.Density_End){
                        result.push(gem)
                        return 1;
                    }
                }
                else if (min_ref != 0 && dbl_ref != 0 && density != 0 && hardness != 0 && color == 0){
                    if(min_ref == gem.Refractive_Index_Start && min_ref == gem.Refractive_Index_End  && dbl_ref >= gem.DRefraction_Start && dbl_ref <= gem.DRefraction_End
                    && density >= gem.Density_Start && density <= gem.Density_End && hardness >= gem.Hardness_Start && hardness <= gem.Hardness_End){
                        result.push(gem)
                        return 1;
                    }
                }
                else if(min_ref != 0 && dbl_ref != 0 && density != 0 && hardness != 0 && color != 0){
                    if(min_ref == gem.Refractive_Index_Start && min_ref == gem.Refractive_Index_End  && dbl_ref >= gem.DRefraction_Start && dbl_ref <= gem.DRefraction_End
                    && density >= gem.Density_Start && density <= gem.Density_End && hardness >= gem.Hardness_Start && hardness <= gem.Hardness_End && color == gem.Colors.toLowerCase()){
                        result.push(gem)
                        return 1;
                    }
                }

            }else{
                if(min_ref != 0 && dbl_ref == 0 && density == 0 && hardness == 0 && color == 0){
                    if(min_ref >= gem.Refractive_Index_Start  && max_ref <= gem.Refractive_Index_End){
                        result.push(gem)
                        return 1;
                    }
                }
                else if (min_ref != 0 && dbl_ref != 0 && density == 0 && hardness == 0 && color == 0){
                    if(min_ref >= gem.Refractive_Index_Start  && max_ref <= gem.Refractive_Index_End && dbl_ref >= gem.DRefraction_Start && dbl_ref <= gem.DRefraction_End){
                        result.push(gem)
                        return 1;
                    }
                }
                else if (min_ref != 0 && dbl_ref != 0 && density != 0 && hardness == 0 && color == 0){
                    if(min_ref >= gem.Refractive_Index_Start  && max_ref <= gem.Refractive_Index_End && dbl_ref >= gem.DRefraction_Start && dbl_ref <= gem.DRefraction_End
                    && density >= gem.Density_Start && density <= gem.Density_End){
                        result.push(gem)
                        return 1;
                    }
                }
                else if (min_ref != 0 && dbl_ref != 0 && density != 0 && hardness != 0 && color == 0){
                    if(min_ref >= gem.Refractive_Index_Start  && max_ref <= gem.Refractive_Index_End && dbl_ref >= gem.DRefraction_Start && dbl_ref <= gem.DRefraction_End
                    && density >= gem.Density_Start && density <= gem.Density_End && hardness >= gem.Hardness_Start && hardness <= gem.Hardness_End){
                        result.push(gem)
                        return 1;
                    }
                }
                else if(min_ref != 0 && dbl_ref != 0 && density != 0 && hardness != 0 && color != 0){
                    if(min_ref >= gem.Refractive_Index_Start  && max_ref <= gem.Refractive_Index_End && dbl_ref >= gem.DRefraction_Start && dbl_ref <= gem.DRefraction_End
                    && density >= gem.Density_Start && density <= gem.Density_End && hardness >= gem.Hardness_Start && hardness <= gem.Hardness_End && color == gem.Colors.toLowerCase()){
                        result.push(gem)
                        return 1;
                    }
                }
            }
            
        }

        //search
        gems.map((gem)=>{
            search(gem);
        
        })

        if(result.length == 0){
            //output node
            const node = document.createElement("div");
            node.className = 'gem';

            const p = document.createElement("p");
            p.className = 'gem-attr';

            const textnode = document.createTextNode(`No Gemstones Found!`);
            p.appendChild(textnode);
            node.appendChild(p);

            output.appendChild(node)
        }

        result.map((gem)=>{
            const node = document.createElement("div");
            node.className = 'gem';

            const p = document.createElement("p");
            p.className = 'gem-attr';

            const textnode = document.createTextNode(`${gem.Gemstone}`);
            p.appendChild(textnode);
            node.appendChild(p);

            output.appendChild(node)
        })

    })
</script>
</html>