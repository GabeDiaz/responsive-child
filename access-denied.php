<?php
/**
 * Created by JetBrains PhpStorm.
 * User: i.nishcheretova
 * Date: 25.02.14
 * Time: 13:18
 * To change this template use File | Settings | File Templates.
 */

if( !defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>


<div id="content" class="grid col-940">


    <div class="crow">

        <div class="container2">
            <h2>You must be a paid subscriber to view this content.</h2>
            <div class="container-bg">
                <div class="col">
                    <div class="title">Not yet a subscriber?</div>
                    <a target="_blank" href="http://pro1.palmbeachletter.com/153235/" class="btn-big">Subscribe now to <em>The&nbsp;Palm&nbsp;Beach&nbsp;Letter</em></a>
                    <p>Your subscription to The Palm Beach Letter includes:</p>
                    <ul>
                        <li>12 monthly issues full of premium investment information you won't find anywhere else</li>
                        <li>Weekly updates from our publisher, Tom Dyson</li>
                        <li>Access to exclusive premium research reports, interviews, and our real-time portfolio tracker</li>
                    </ul>
                </div>



                <div class="col fright">
                    <div class="title">Already a subscriber?</div>
                    <form action="<?php bloginfo('url');?>/action" method="post" name="sidebar_member_login">
                        <div class="formlogin">
                            <div class="row"><label for="log" class="label"><?php _e('Username:', 'aps'); ?></label>  <input class="input1" id="Username" name="log" type="text" value="<?php if(isset($_POST['log'])) { echo esc_attr($_POST['log']); }?>"></div>
                            <div class="row"><label for="pwd" class="label"><?php _e('Password:', 'aps'); ?></label>  <input class="input1" id="Password" name="pwd" type="password" value="<?php if(isset($_POST['pwd'])) { echo esc_attr($_POST['pwd']); }?>"></div>
                            <div class="row row-submit">
                                <button type="submit" class="login-button"></button>
                                <label> <input id="KeepMeLogged" name="KeepMeLogged" type="checkbox" value="true"><input name="KeepMeLogged" type="hidden" value="false"> Keep me logged in</label>
                            </div>
                            <input type="hidden" name="cf_login_action" value="login" />
                            <input type="hidden" name="cf_form_name" value="sidebar" />

<input type="hidden" name="redirect_to" value="<?php echo bloginfo('url'); echo '/my-subscriptions';?>" />
                        

</div>
                        <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                    </form>
                    <p class="tcenter">Thank you for being a <br><em>Palm Beach Letter</em> subscriber!</p>
                </div>


            </div>
        </div>

    </div>
    </div>

    <?php get_footer();?>