<?php
/**
 * Created by PhpStorm.
 * User: linzhiyuan
 * Date: 2018/4/14
 * Time: 15:14
 */

function displayGuestSite($site){
    $siteName = $site->name;
    $url = $site->url;
    $image = $site->image;
    $siteID = $site->id;
    $alexa = $site->alexa;
    echo "
		    <li class='oneSite'>
				<a class='sites' href=$url target='_blank'>"; ?>
    <img src="<?php echo asset("$image"); ?>" style="width: 150px; height: 52.5px;">
    <?php echo "
					<p>$siteName</p>
					<br class=''>
				</a>
			</li>
		";
}

function displaySite($site){
    $siteName = $site->name;
    $url = $site->url;
    $image = $site->image;
    $siteID = $site->id;
    $alexa = $site->alexa;
    echo "
		    <li class='oneSite'><span class='close' id='$siteID'>&times;</span>
				<a class='sites' href=$url target='_blank' onclick='addAlexa($siteID)'>"; ?>
                    <img src="<?php echo asset("$image"); ?>" style="width: 150px; height: 52.5px;">
    <?php echo "
					<p>$siteName</p>
					<br class=''>
				</a>
			</li>
		";
}

function displayType($type) {
    $typeName = $type->type_name;
    $typeId = $type->id;
    echo "<div id='header'>
                <h2>
                    <button id='EB' class='controlEdit' type='button' onclick='editEnable($typeId)'>+</button>
                    $typeName
                </h2>
            </div>
            <div class='edit' id='edit$typeId' style='display: none;'>
                <form class='newSites form-inline' method='POST'>
                <div class='form-group'>
                <input type='text' name='name' class='form-control' placeholder='Name' required>
                </div>
                <div class='form-group'>
                <input type='text' name='address' class='form-control' placeholder='URL' required>
                </div>
                <div class='form-group'>
                <a class='file'>Image
                    <input id='Image' name='Image' type='file' />
                </a>
                </div>
                <div class='form-group'>
                <input title='submit' type='submit' value='ADD' id='add' class='btn btn-default'>
                </div>
                <input type='hidden' name='typeId' value=$typeId>
                </form>
            </div>
    ";
}

function checkimg($img, $site) {
    $allowed_file_types = array('.jpg','.jpeg','.png','.gif');
    $filename = $img->getClientOriginal();
    $file_ext = substr($filename, strripos($filename, '.'));
    $filesize = $img["size"];
    $fixedSileName = str_replace(" ", "_", $site);
    $uploaddir = 'images/Websites/default/';
    if (in_array($file_ext,$allowed_file_types) && ($filesize < 600000)) {
        $uploadfile = $uploaddir . $fixedSileName . $file_ext;
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        } else {
            echo "Possible file upload attack!\n";
        }
    }
}


function ajax() {
    $userId = Auth::user()->id;
    $types = DB::select("select * from types where user_id = '$userId'");
    $value = "";
    foreach($types as $type) {
        $value .= displayType($type) . "<div id='$type->id'>";
        $websites = DB::select("select * from websites where user_id = '$userId' and type_id = '$type->id'");
        foreach ($websites as $website) {
            $value .= displaySite($website);
        }
        $value .= "</div>";
    }
    return $value;
}