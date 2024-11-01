<?php
function spb_bf_admin_page() {
?>
    <style>
        #wpcontent {
            padding: 0;
        }
    </style>
    <div class="admin_show_bundle_servizitrepuntozero">
        <div class="options_bundle_servizitrepuntozero_free">
            <div style="margin-bottom:1em; width:100%; display: flex; flex-direction: column;">
                <?php echo '<img src="' . esc_url(plugins_url('/assets/logo_servizi-plugintrasparente.png', dirname(__FILE__))) . '" alt="Logo Servizi 3.0" height="100%" width="15%" id="logo_servizi" style="margin-left: 10px; margin-top: 1em;">'; ?>
                <div id="logo_servizi_bundle_" style="line-height: 2.4em; text-align: left; padding-left: 10px; padding-right: 10px; display:flex; flex-direction:row; justify-content:flex-start; align-items: baseline; margin-top: 5px; margin-bottom: 5px;">
                    <h1 class="title_bundle_servizi">Simple Product Bundle</h1>
                </div>
            </div>

            <div class="admin_options_text_bundle_servizitrepuntozero" style="width: 99%;">
                <div class="admin_options_bundle_servizitrepuntozero" style="padding: 10px;">
                    <div class="container" style="border: 1px solid white; border-radius: 4px; padding: 30px; background-color: #ffffff; box-shadow: 2px 1px 10px #cdcdcd;">
                        <div class="row" id="row_admin_bundle" style="display: flex; flex-direction: row;">
                            <div class="col-6" id="col-6_1" style="padding: 10px; width: 50%;">
                                <p class="admin_text_free_section_bundle" style="padding: 0px 10px 10px 0px; font-size: 22px; margin-top: 0; margin-bottom: 0; color: #484848;">
                                    <b><?php echo esc_html_e('Do you want to customize the look of your bundle?', 'bundle-servizitrepuntozero-domain'); ?></b>
                                </p>
                                <p class="options_text_free_version_servizitrepuntozero" style="margin-top: 0; margin-right: 30px; text-align: justify; font-size: 16px;">
                                    <?php echo esc_html_e('With Simple Product Bundle PRO you can highly customize the offers of your site and attract more clients:', 'bundle-servizitrepuntozero-domain'); ?>
                                </p>
                                <!-- Lista con funzionalità -->
                                <div class="bundle_list_free_version" style="display: flex; justify-content: space-evenly; flex-direction: column;">
                                    <div class="list_1" style="display: flex; flex-direction: row;">
                                        <i style="color: #00ce00; font-size: 20px; padding-right: 15px;">&#10004;</i>
                                        <li class="first_option_group_free_version" style="list-style: none; padding-bottom: 20px; font-size: 14px;"><?php echo esc_html_e('Compatible with multilingual (you can create different offers per language)', 'bundle-servizitrepuntozero-domain'); ?></li>
                                    </div>
                                    <div class="list_2" style="display: flex; flex-direction: row;">
                                        <i style="color: #00ce00; font-size: 20px; padding-right: 15px;">&#10004;</i>
                                        <li class="second_option_group_free_version" style="list-style: none; padding-bottom: 20px; font-size: 14px;"><?php echo esc_html_e('You can use the shortcode to publishh your bundle anywhere you want on the product page', 'bundle-servizitrepuntozero-domain'); ?></li>
                                    </div>
                                    <div class="list_3" style="display: flex; flex-direction: row;">
                                        <i style="color: #00ce00; font-size: 20px; padding-right: 15px;">&#10004;</i>
                                        <li class="third_option_group_free_version" style="list-style: none; padding-bottom: 20px; font-size: 14px;"><?php echo esc_html_e('Customize the graphic aspect of your bundle', 'bundle-servizitrepuntozero-domain'); ?></li>
                                    </div>
                                    <div class="list_4" style="display: flex; flex-direction: row;">
                                        <i style="color: #00ce00; font-size: 20px; padding-right: 15px;">&#10004;</i>
                                        <li class="fourth_option_group_free_version" style="list-style: none; padding-bottom: 20px; font-size: 14px;"><?php echo esc_html_e('Customize the font size and the colors of the button and texts', 'bundle-servizitrepuntozero-domain'); ?></li>
                                    </div>
                                </div>
                            </div>

                            <div class="vl" style="border-left: 2px solid lightgray; height: auto;"></div>

                            <div class="col-6" id="col-6_2" style="padding: 10px; width: 50%; text-align: center;">
                                <div class="img_container" style="flex-direction: column; padding: 0px 10px 10px 10px; margin-left: 20px; width: auto; height: auto; text-align: center;">
                                    <img src="<?= esc_url(plugins_url('assets/logo-bundle-blu.png', dirname(__FILE__)));?>" alt="Logo Bundle" height="100%" width="40%" >
                                </div>
                                <p class="admin_text_free_section_bundle" style="padding: 10px 10px 30px 10px; font-size: 22px; margin-top: 0; margin-bottom: 0; color: #484848;">
                                    <b>Simple Product Bundle PRO</b></p>
                                <div class="container" style="display: flex; flex-direction: column; align-items: center;">
                                    <a href="https://www.servizitrepuntozero.com/prodotto/simple-woocommerce-product-bundle-pro/" target="_blank">
                                        <button name="buy_pro_version" class="btn buy_pro_version_servizitrepuntozero" style="font-size: 18px; cursor: pointer; background-color: #ff9600; border-color: #ff9600; color: white; padding: 6px 12px; border-radius: 4px;"><?php echo _e('Discover the PRO version', 'bundle-servizitrepuntozero-domain'); ?></button>
                                    </a>
                                    <a href="<?= (ICL_LANGUAGE_CODE == 'it') ? 'https://www.servizitrepuntozero.com/guida-simple-woocommerce-product-bundle-plugin/' : 'https://www.servizitrepuntozero.com/simple-woocommerce-product-bundle-plugin-guide/'; ?>" target="_blank" id="text_pro_version" style="border: none; outline: none; width: fit-content; padding-top: 30px; text-decoration: none; color: #484848; font-size: 16px;">
                                        <i><b><?php echo esc_html_e('Read the full documentation', 'bundle-servizitrepuntozero-domain'); ?></b></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="width: 99%; height: 100%;">
                <div class="container" style="padding: 10px;">
                    <div class="container" style="border: 1px solid white; border-radius: 4px; padding: 30px; background-color: #ffffff; box-shadow: 2px 1px 10px #cdcdcd;">
                        <div class="free_bundle_image_holder" style="text-align: center;">
                            <img src="<?= (ICL_LANGUAGE_CODE == 'it') ? esc_url(plugins_url('/assets/acquista-versione-pro.jpg', dirname(__FILE__))) : esc_url(plugins_url('/assets/acquista-versione-pro-eng.jpg', dirname(__FILE__))); ?>" alt="Bundle PRO Logo" height="100%" width="100%" id="'img_of_pro_version'" style="border-radius: 6px;"
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}