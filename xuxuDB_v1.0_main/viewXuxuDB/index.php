<?php
$optionDrivers = "";
foreach(PDO::getAvailableDrivers() as $key => $value){
	if(trim(strtolower($value)) == 'mysql'){
		$optionDrivers .="<option value='".$value."' selected >MariaDB</option>";
	}
	$optionDrivers .="<option value='".$value."'>".$value."</option>";
}

include_once($_SERVER['DOCUMENT_ROOT']."/viewXuxuDB/topXuxuDB.php");
?>

<div id="formXuxuDB">
	<form action="" method="post" name="formConnectionXuxuDB" id="formConnectionXuxuDB" novalidate>
		<fieldset>

			<div class="item">
				<label>
				   <span>Data Base Driver:</span>
					<select name="db_driver" id="db_driver" required="required">
						<option selected="selected" value=""> >> Choose a PDO Database Driver<< </option>
						<?php echo $optionDrivers; ?>
					</select>
				</label>
				<div class='tooltip help'>
					<span>?</span>
					<div class='content'>
						<b></b>
						<p>It shows all available PDO database drivers. Whether you need another one, please enable it in the php.ini file.</em></p>
					</div>
				</div>
			</div>
			<div class="item">
				<label for="host">
					<span>Host:</span>
					<input type="text" name="host" id="host" required="required"/>
				</label>
				<span class='extra'>(Ex: Localhost)</span>
			</div>
			<div class="item">
				<label>
					<span for="dbname">Data Base Name:</span>
					<input type="text"  required="required" name="dbname" id="dbname"/>
				</label>
			</div>
			<div class="item">
				<label>
					<span for="user">User:</span>
					<input type="text" name="user"id="user"/>
				</label>
			</div>
			<div class="item">
				<label>
					<span for="password">Password:</span>
					<input type="text" name="password" id="password" />
				</label>
			</div>
			<p id="p_conection_button">
				<input type="submit" name="sendConnection" id="sendConnection" value="Let's Go! &nbsp; ;)" />
			</p>
			<p class="loading">
				<img src="viewXuxuDB/img/loading.gif" height="220px" alt="">
			</p>
		</fieldset>
	</form>
</div>
<div id="admin_panel">
	<fieldset>
		<legend>&nbsp;&nbsp;&nbsp;Panel Context</legend>
		<div id="admin_panel_content">
		</div>
	</fieldset>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/viewXuxuDB/bottomXuxuDB.php"); ?>