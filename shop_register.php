<?php
include("functions/main.php");
$page_title = 'Register - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/shopRegiserApp.class.php');

?>

<?php

$ip_address = getRealIpUser();

$stmtIP = $db->prepare('SELECT COUNT(*) FROM cart WHERE ip_address = :ip_address');
$stmtIP->execute(array(':ip_address' => $ip_address));

$row = $stmtIP->fetch();
$countIP = $row[0];

?>

<section class="container login-section" style="margin-bottom: 100px;">
    <?php include('includes/includes_main.php'); ?>


    <div class="card login-card mx-auto" style="max-width:550px; border: 1px solid red;">
        <article class="card-body">
            <header class="mb-4">
                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            </header>

            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <form id="regiration_form" novalidate action="" method="post">
                <fieldset>

                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 1: Create your account</h4>
                    </div>



                    <div class="form-group">
                        <label class="form-label" for="email">Username</label>
                        <input type="text" class="form-control" id="username" value="<?php if (isset($m_username)) echo $m_username; ?>" name="Username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="Email" size="32" value="<?php if (isset($email)) echo $email; ?>" maxlength="60" class="form-control" placeholder="Email address" />
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Create password</label>
                        <input type="password" placeholder="Enter Password" name="Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Repeat password</label>
                        <input type="password" placeholder="Confirm Password" name="Password2" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." placeholder="Confirm Password"/>
                    </div>
                    <input type="button" name="next" class="next btn btn-primary-next" value="Next" />
                </fieldset>

                <fieldset>
                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 2: Personal Details</h4>
                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label class="form-label">First name</label>
                            <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($name)) echo $name; ?>" class="form-control" placeholder="Your name"/>
                        </div> <!-- form-group end.// -->
                        <div class="col form-group">
                            <label class="form-label">Last name</label>
                            <input type="text" name="Surname" size="32" maxlength="60" value="<?php if (isset($surname)) echo $surname; ?>" class="form-control" placeholder="Your surname" />
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->

                    <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" checked="" type="radio" name="Gender" value="Male">
                            <span class="custom-control-label"> Male </span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="Gender" value="Female">
                            <span class="custom-control-label"> Female </span>
                        </label>
                    </div> <!-- form-group end.// -->

                    <input type="button" name="previous" class="previous btn btn-primary-previous" value="Previous" />
                    <input type="button" name="next" class="next btn btn-primary-next" value="Next" />
                </fieldset>

                <fieldset>

                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 3:Personal Contact Information</h4>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Contact Details</label>
                        <input type="tel" name="Cell" size="10" value="<?php if (isset($cell)) echo $cell; ?>" maxlength="12" class="form-control" placeholder="Cellphone number">
                    </div> <!-- form-group end.// -->

                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" name="Address" size="32" value="<?php if (isset($street_address)) echo $street_address; ?>" maxlength="60" class="form-control" placeholder="Street Address">
                    </div> <!-- form-group end.// -->

                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" name="City" size="32" value="<?php if (isset($city)) echo $city; ?>" maxlength="60" class="form-control" placeholder="City">
                    </div> <!-- form-group end.// -->


                    <div class="form-group ">
                        <label class="form-label">Kasi</label>
                        <select id="inputCity" name="Kasi" class="form-control">
                                <option> Choose...</option>
                                <option value="Vaal">Vaal</option>
                                <option value="Soweto">Soweto</option>
                                <option value="Alex">Alex</option>
                            </select>
                    </div> <!-- form-group end.// -->


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Province</label>
                            <select id="inputProvince" name="Province" class="form-control">
                                <option> Choose...</option>
                                <option value="Gauteng">Gauteng</option>
                                <option value="Free State">Free State</option>
                                <option value="Kwa Zulu-Natal">Kwa Zulu-Natal</option>
                                <option value="Eastern Cape">Eastern Cape</option>
                                <option value="Limpopo">Limpopo</option>
                                <option value="Western Cape">Western Cape</option>
                                <option value="Mpumalanga">Mpumalanaga</option>
                                <option value="Northan Cape">Northan Cape</option>
                                <option value="North West">North West</option>
                            </select>
                        </div> <!-- form-group end.// -->

                        <div class="form-group col-md-6">
                            <label class="form-label">Zip</label>
                            <input type="text" name="Zip" size="10" value="<?php if (isset($zip)) echo $zip; ?>" maxlength="10" class="form-control" placeholder="Zip code">
                        </div>
                    </div> <!-- form-group end.// -->

                    <input type="button" name="previous" class="previous btn btn-primary-previous" value="Previous" />
                    <input type="button" name="next" class="next btn btn-primary-next" value="Next" />
                </fieldset>

                <fieldset>
                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 4: Shop Details</h4>
                    </div>


                    <div class="form-group">
                        <label class="form-label">Shop Name</label>
                        <input type="text" name="Shop_Name" size="32" maxlength="60" value="<?php if (isset($shop_name)) echo $shop_name; ?>" class="form-control" placeholder="Shop name"/>
                    </div> <!-- form-group end.// -->

                    <div class="form-group">
                        <label class="form-label">About Shop</label>
                        <textarea class="form-control" name="About" cols="5" rows="15" placeholder="What type of service or products do you offer?"><?php if (isset($shop_description)) echo $shop_description; ?></textarea>
                    </div> <!-- form-group end.// -->

                    <input type="button" name="previous" class="previous btn btn-primary-previous" value="Previous" />
                    <input type="button" name="next" class="next btn btn-primary-next" value="Next" />
                </fieldset>

                <fieldset>

                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 5:Shop Contact Information</h4>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="Email" name="Shop_Email" size="30" value="<?php if (isset($shop_email)) echo $shop_email; ?>" maxlength="60" class="form-control" placeholder="Business email">
                    </div> <!-- form-group end.// -->

                    <div class="form-group">
                        <label class="form-label">Contact Details</label>
                        <input type="tel" name="Shop_Cell" size="10" value="<?php if (isset($shop_cell)) echo $shop_cell; ?>" maxlength="12" class="form-control" placeholder="Business cell">
                    </div> <!-- form-group end.// -->

                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" name="Shop_Address" size="32" value="<?php if (isset($shop_address)) echo $street_address; ?>" maxlength="60" class="form-control" placeholder="Business address">
                    </div> <!-- form-group end.// -->

                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" name="Shop_City" size="32" value="<?php if (isset($shop_city)) echo $shop_city; ?>" maxlength="60" class="form-control" placeholder="Business city">
                    </div> <!-- form-group end.// -->



                    <div class="form-group ">
                        <label class="form-label">Kasi</label>
                        <select id="inputCity" name="Shop_Kasi" class="form-control">
                            <option> Choose...</option>
                            <option value="Vaal">Vaal</option>
                            <option value="Soweto">Soweto</option>
                            <option value="Alex">Alex</option>
                        </select>
                    </div> <!-- form-group end.// -->


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Province</label>
                            <select id="inputProvince" name="Shop_Province" class="form-control">
                                <option> Choose...</option>
                                <option value="Gauteng">Gauteng</option>
                                <option value="Free State">Free State</option>
                                <option value="Kwa Zulu-Natal">Kwa Zulu-Natal</option>
                                <option value="Eastern Cape">Eastern Cape</option>
                                <option value="Limpopo">Limpopo</option>
                                <option value="Western Cape">Western Cape</option>
                                <option value="Mpumalanga">Mpumalanaga</option>
                                <option value="Northan Cape">Northan Cape</option>
                                <option value="North West">North West</option>
                            </select>
                        </div> <!-- form-group end.// -->

                        <div class="form-group col-md-6">
                            <label class="form-label">Zip</label>
                            <input type="text" name="Shop_Zip" size="10" value="<?php if (isset($shop_zip)) echo $shop_zip; ?>" maxlength="10" class="form-control" placeholder="Zip code">
                        </div>
                    </div> <!-- form-group end.// -->

                    <input type="button" name="previous" class="previous btn btn-primary-previous" value="Previous" />
                    <input type="button" name="next" class="next btn btn-primary-next" value="Next" />


                </fieldset>

                <fieldset>

                    <div class="container section-heading">
                        <h4 class="section-title text-center">Step 4: Shop Logo</h4>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Shop Picture</label>
                        <input type="file" class="form-height-custom" name="image"><br>
                    </div>



                    <input type="button" name="previous" class="previous btn btn-primary-previous" value="Previous" />
                    <input type="submit" name="register" class="btn btn-primary-login btn-block" value="Register">
                </fieldset>
            </form>





        </article><!-- card-body.// -->
    </div>


</section>

<?php include('includes/appfooter.php'); ?>