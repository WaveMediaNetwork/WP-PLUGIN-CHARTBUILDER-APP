jQuery(document).ready( function () {
    jQuery('#cba-navigation-menu li').click( function (element) {
        element.preventDefault();
        let navMenuElementID = jQuery(this).attr('id'),
            sectionID = navMenuElementID.replace(/\bnav-/g, ""),
            test = '';

        jQuery('.cba-section-wrapper').each( function () {
            let section = jQuery(this);

            if (section.attr('id') === sectionID ) {
                section.addClass('active');
            }
            else {
                section.removeClass('active');
            }

        });

    });
});