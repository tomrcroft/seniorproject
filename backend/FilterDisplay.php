<?php filterDisplay();

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function filterDisplay()
{
    //print the search filter
    echo '<ul class="side-nav" id="facets">
            <li class="facet-category" id="age-facet">
                <label>Age</label>
                <li><input id="adult_facet" type="checkbox" value="adult"><label for="adult_facet">Adult</label></li>
                <li><input id="child_facet" type="checkbox" value="child"><label for="child_facet">Child</label></li>
            </li>
            <li class="facet-category" id="gender-facet">
                <label>Gender</label>
                <li><input id="male_facet" type="checkbox" value="male"><label for="male_facet">Male</label></li>
                <li><input id="female_facet" type="checkbox" value="female"><label for="female_facet">Female</label></li>
            </li>
            <li class="facet-category" id="price-facet">
                <label>Rental Fee</label>
                <li><input id="pricefacet_less25" type="checkbox" value="less25"><label for="pricefacet_less25">Less Than $25.00</label></li>
                <li><input id="pricefacet_50" type="checkbox" value="25-50"><label for="pricefacet_50">$25.00 - $50.00</label></li>
            </li>
            <li class="facet-category" id="group-facet">
                <label>Costume Group</label>
                <li><input id="group_facet1" type="checkbox" value="group1"><label for="group_facet1">Into the Woods</label></li>
                <li><input id="group_facet2" type="checkbox" value="group2"><label for="group_facet2">Ballet</label></li>
            </li>

            <li><div class="button" id="filter_button">Filter</div></li>
        </ul>';
}
?>
