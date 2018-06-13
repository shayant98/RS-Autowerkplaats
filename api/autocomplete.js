$("[id$='merk']").easyAutocomplete({

	url: "api/models.txt",

	getValue: "title",

	list: {
		match: {
			enabled: true
		}
	}
});
