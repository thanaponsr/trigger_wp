( function( api ) {

	// Extends our custom "extension" section.
	api.sectionConstructor['extension'] = api.Section.extend( {

		// No extensions for this type of section.
		attachExtensions: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
