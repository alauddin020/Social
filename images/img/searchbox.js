// April 2016 by Patrick God
// Visit http://patrickgod.com/facebook-like-searchbox-with-jquery/

$(document).ready(function () {
    var contacts = [
    {
        "firstName": "Peter",
        "lastName": "Parker",
        "heroName": "Spiderman",
        "imgUrl": "img/spiderman.png"
    },
    {
        "firstName": "Bruce",
        "lastName": "Banner",
        "heroName": "Hulk",
        "imgUrl": "img/hulk.png"
    }, {
        "firstName": "Tony",
        "lastName": "Stark",
        "heroName": "Ironman",
        "imgUrl": "img/ironman.png"
    }, {
        "firstName": "Bruce",
        "lastName": "Wayne",
        "heroName": "Batman",
        "imgUrl": "img/batman.png"
    }
    ];
    
    for (var i = 0; i < contacts.length; i++)
    {
        contacts[i].value = contacts[i].firstName + " " + contacts[i].lastName + " " + contacts[i].heroName;
    }

    $("#searchbox").autocomplete({
        source: contacts,
        minLength: 0,
        focus: function (event, ui) {
            $("#searchbox").val(ui.item.heroName)
            return false;
        },
        select: function (event, ui) {
            location.href = ui.item.imgUrl;
            return false;
        },
    }).autocomplete("instance")._renderItem = function (ul, item) {
        var $li = $("<li>");
        $li.addClass("searchItem");

        $outerDiv = $("<div>");
        $outerDiv.appendTo($li);

        $imageDiv = $("<div>");
        $imageDiv.addClass("contactImageDiv");
        $imageDiv.appendTo($outerDiv);

        $img = $("<img>");
        $img.addClass("contactImage");
        $img.attr("src", item.imgUrl);
        $img.appendTo($imageDiv);

        $name = $("<div>");
        $name.addClass("nameDiv");
        $name.append(item.firstName + " " + item.lastName + "<br/><span style='font-style:italic'>" + item.heroName + "</span>");
        $name.appendTo($outerDiv);

        $li.appendTo(ul);

        return $li;
    };

})