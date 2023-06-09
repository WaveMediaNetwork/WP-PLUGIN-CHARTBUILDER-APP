<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<form method="post">
    <h3><?php esc_html_e( 'Currency', 'paid-member-subscriptions' ); ?></h3>

    <h4><?php esc_html_e( 'What currency do you want to accept payments in?', 'paid-member-subscriptions' ); ?></h4>
    <select id="payment-currency" name="pms_payments_currency">
        <?php
        foreach( pms_get_currencies() as $currency_code => $currency )
            echo '<option value="' . esc_attr( $currency_code ) . '"' . selected( pms_get_active_currency(), $currency_code, false ) . '>' . esc_html( $currency ) . '</option>';
        ?>
    </select>

    <h4><?php esc_html_e( 'Where do you want the Currency symbol to be displayed?', 'paid-member-subscriptions' ); ?></h4>
    <select id="payment-currency-position" name="pms_payments_currency_position">
        <option value="before" <?php ( isset( $this->payments_settings['currency_position'] ) ? selected( $this->payments_settings['currency_position'], 'before', true ) : ''); ?>><?php esc_html_e( 'Before', 'paid-member-subscriptions' ); ?></option>
        <option value="before_with_space" <?php ( isset( $this->payments_settings['currency_position'] ) ? selected( $this->payments_settings['currency_position'], 'before_with_space', true ) : ''); ?>><?php esc_html_e( 'Before with space', 'paid-member-subscriptions' ); ?></option>
        <option value="after" <?php ( isset( $this->payments_settings['currency_position'] ) ? selected( $this->payments_settings['currency_position'], 'after', true ) : ''); ?>><?php esc_html_e( 'After', 'paid-member-subscriptions' ); ?></option>
        <option value="after_with_space" <?php ( isset( $this->payments_settings['currency_position'] ) ? selected( $this->payments_settings['currency_position'], 'after_with_space', true ) : ''); ?>><?php esc_html_e( 'After with space', 'paid-member-subscriptions' ); ?></option>
    </select>

    <h4><?php esc_html_e( 'How should prices be displayed?', 'paid-member-subscriptions' ); ?></h4>
    <select id="payment-price-format" name="pms_payments_price_format">
        <option value="without_insignificant_zeroes" <?php ( isset( $this->payments_settings['price-display-format'] ) ? selected( $this->payments_settings['price-display-format'], 'without_insignificant_zeroes', true ) : ''); ?>><?php echo isset( $this->payments_settings['currency_position'] ) && $this->payments_settings['currency_position'] == 'after' ? '100$' : '$100'; ?></option>
        <option value="with_insignificant_zeroes" <?php ( isset( $this->payments_settings['price-display-format'] ) ? selected( $this->payments_settings['price-display-format'], 'with_insignificant_zeroes', true ) : ''); ?>><?php echo isset( $this->payments_settings['currency_position'] ) && $this->payments_settings['currency_position'] == 'after' ? '100.00$' : '$100.00'; ?></option>
    </select>

    <h4><?php esc_html_e( 'How should automatic subscription renewal work?', 'paid-member-subscriptions' ); ?></h4>
    <select id="payment-renewal" name="pms_payments_renewal">
        <option value="1" <?php ( isset( $this->payments_settings['recurring'] ) ? selected( $this->payments_settings['recurring'], '1', true ) : ''); ?>><?php esc_html_e( 'Customer opts in for automatic renewal', 'paid-member-subscriptions' ); ?></option>
        <option value="2" <?php ( isset( $this->payments_settings['recurring'] ) ? selected( $this->payments_settings['recurring'], '2', true ) : ''); ?>><?php esc_html_e( 'Always renew automatically', 'paid-member-subscriptions' ); ?></option>
        <option value="3" <?php ( isset( $this->payments_settings['recurring'] ) ? selected( $this->payments_settings['recurring'], '3', true ) : ''); ?>><?php esc_html_e( 'Never renew automatically', 'paid-member-subscriptions' ); ?></option>
    </select>

    <h3><?php esc_html_e( 'Payment Gateways', 'paid-member-subscriptions' ); ?></h3>

    <div class="pms-setup-pages">

        <div class="pms-setup-gateway">
            <div class="pms-setup-gateway__logo">
                <img src="<?php echo esc_url( PMS_PLUGIN_DIR_URL ) . '/assets/images/pms-stripe.png'; ?>" />
            </div>
            <div class="pms-setup-gateway__description">
                <?php esc_html_e( 'Accept payments directly on your website using a wide range of payment methods allowing for a faster checkout directly on your website. Enable users to pay using debit or credit cards, Bancontact, Giropay, iDEAL, Sofort and many more.', 'paid-member-subscriptions' ); ?>
            </div>
            <div class="pms-setup-toggle">
                <input type="checkbox" name="pms_gateway_stripe" id="pms_gateway_stripe" <?php echo $this->check_gateway( 'stripe_connect' ) ? 'checked' : '' ?> /><label for="pms_gateway_stripe">Toggle</label>
            </div>
        </div>

        <div class="pms-setup-gateway pms-setup-gateway-extra stripe">
            <div class="pms-setup-gateway__logo">

            </div>

            <div class="pms-setup-gateway__description pms-setup-gateway__description-extra">
                <div style="font-weight:bold; font-size: 110%;">
                    <?php echo wp_kses( __( 'After finishing setup, please go to the PMS -> Settings -> Payments page in order to continue the setup for this gateway.', 'paid-member-subscriptions' ), $this->kses_args ); ?>
                    <a href="https://www.cozmoslabs.com/docs/paid-member-subscriptions/payment-gateways/stripe-connect/#Initial_Setup/?utm_source=wpbackend&utm_medium=pms-setup-wizard&utm_campaign=PMSFreeStripeInitialSetup" target="_blank">
                        <?php esc_html_e( 'Learn More', 'paid-member-subscriptions' ); ?>
                    </a>
                </div>
            </div>

            <div class="pms-setup-toggle"></div>
        </div>

        <div class="pms-setup-gateway">
            <div class="pms-setup-gateway__logo">
                <img src="<?php echo esc_url( PMS_PLUGIN_DIR_URL ) . '/assets/images/pms-paypal-logo.png'; ?>" />
            </div>
            <div class="pms-setup-gateway__description"><?php esc_html_e( 'Safe and secure payments handled by PayPal using the customers account.', 'paid-member-subscriptions' ); ?></div>
            <div class="pms-setup-toggle">
                <input type="checkbox" name="pms_gateway_paypal_standard" id="pms_gateway_paypal_standard" value="1" <?php echo $this->check_gateway( 'paypal_standard' ) ? 'checked' : '' ?>/><label for="pms_gateway_paypal_standard">Toggle</label>
            </div>
        </div>

        <div class="pms-setup-gateway pms-setup-gateway-extra paypal">
            <div class="pms-setup-gateway__logo">

            </div>

            <div class="pms-setup-gateway__description pms-setup-gateway__description-extra paypal">
                <div class="pms-setup-gateway__description">
                    <label class="pms-setup-label" for="pms_gateway_paypal_email_address"><?php esc_html_e( 'PayPal Email Address', 'paid-member-subscriptions' ); ?></label>
                    <input type="email" name="pms_gateway_paypal_email_address" id="pms_gateway_paypal_email_address" value="<?php echo esc_attr( pms_get_paypal_email() ); ?>" />
                </div>
                <div>
                    <?php echo wp_kses( __( 'For payments to work correctly, you will also need to <strong>setup the IPN URL in your PayPal account</strong>.', 'paid-member-subscriptions' ), $this->kses_args ); ?>
                    <a href="https://www.cozmoslabs.com/docs/paid-member-subscriptions/member-payments/#IPN_for_PayPal_gateways/?utm_source=wpbackend&utm_medium=pms-setup-wizard&utm_campaign=PMSFreePayPalIPN" target="_blank">
                        <?php esc_html_e( 'Learn More', 'paid-member-subscriptions' ); ?>
                    </a>
                </div>
            </div>

            <div class="pms-setup-toggle"></div>
        </div>

        <div class="pms-setup-gateway">
            <div class="pms-setup-gateway__logo">
                <?php esc_html_e( 'Offline Payments', 'paid-member-subscriptions' ); ?>
            </div>
            <div class="pms-setup-gateway__description">
                <?php esc_html_e( 'Manually collect payments from your customers through Checks, Direct Bank Transfers or in person cash.', 'paid-member-subscriptions' ); ?>
            </div>
            <div class="pms-setup-toggle">
                <input type="checkbox" name="pms_gateway_offline" id="pms_gateway_offline" value="1" <?php echo $this->check_gateway( 'manual' ) ? 'checked' : '' ?>/><label for="pms_gateway_offline">Toggle</label>
            </div>
        </div>

        <div class="pms-setup-gateway pms-setup-fade">
            <div class="pms-setup-gateway__logo">
                <img src="<?php echo esc_url( PMS_PLUGIN_DIR_URL ) . '/assets/images/pms-paypal-pro-express-logo.png'; ?>" />
            </div>
            <div class="pms-setup-gateway__description"><?php esc_html_e( 'PayPal Express Checkout payments using credit cards or customer accounts handled by PayPal.', 'paid-member-subscriptions' ); ?></div>
            <div class="pms-setup-toggle">
                <input type="checkbox" name="pms_gateway_paypal_pro_express" id="pms_gateway_paypal_pro_express" disabled /><label for="pms_gateway_paypal_pro_express">Toggle</label>
            </div>
        </div>

        <div class="pms-setup-gateway">
            <div class="pms-setup-gateway__upsell">
                <?php echo wp_kses_post( __( 'Additional <strong>Payment Gateways</strong>, Taxes, Invoices and other features are available with a <strong>Pro</strong> licence of Paid Member Subscriptions.', 'paid-member-subscriptions' ) ); ?>
                <a href="https://www.cozmoslabs.com/wordpress-paid-member-subscriptions/?utm_source=wpbackend&utm_medium=pms-setup-wizard&utm_campaign=PMSFreeGateways" target="_blank">
                    <?php esc_html_e( 'Learn More', 'paid-member-subscriptions' ); ?>
                </a>
            </div>
        </div>
    </div>

    <div class="pms-setup-form-button">
        <input type="submit" class="button primary button-primary button-hero" value="<?php esc_html_e( 'Continue', 'paid-member-subscriptions' ); ?>" />
    </div>

    <?php wp_nonce_field( 'pms-setup-wizard-nonce', 'pms_setup_wizard_nonce' ); ?>
</form>
