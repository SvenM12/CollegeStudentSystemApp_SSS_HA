document.getElementById("filter_college_id").addEventListener("change", function () {
        let collegeId = this.value || this.options[this.selectedIndex].value;
        if (window.location.href.includes('name='))
        {
            if (window.location.href.includes('college_id='))
            {
                let collegeIdHref = window.location.href.split('&');
                let firstParam = collegeIdHref[0].split('?')[1];
                let secondParam = collegeIdHref[1];
                //Replaces the part of the link that contains college_id with the updated value
                if (firstParam.includes('college_id='))
                {
                    window.location.href = window.location.href.replace(firstParam, 'college_id=' + collegeId);
                }
                if (secondParam.includes('college_id='))
                {
                    window.location.href = window.location.href.replace(secondParam, 'college_id=' + collegeId);
                }
            }
            else {
                window.location.href = "?" + window.location.href.split("?")[1] + "&college_id=" + collegeId;
            }
        }
        else {
            window.location.href = window.location.href.split("?")[0] + "?college_id=" + collegeId;
        }
    });

document.getElementById("sort_college_id").addEventListener("change", function () {
    let sortVal = this.value || this.options[this.selectedIndex].value;
    if (window.location.href.includes('college_id='))
        {
            if (window.location.href.includes('name='))
            {
                let sortValHref = window.location.href.split('&');
                let firstParam = sortValHref[0].split('?')[1];
                let secondParam = sortValHref[1];
                //Replaces the part of the link that contains name= with the updated value
                if (firstParam.includes('name='))
                {
                    window.location.href = window.location.href.replace(firstParam, 'name=' + sortVal);
                }
                if (secondParam.includes('name='))
                {
                    window.location.href = window.location.href.replace(secondParam, 'name=' + sortVal);
                }
            }
            else {
                window.location.href = "?" + window.location.href.split("?")[1] + "&name=" + sortVal;
            }
        }
    else {
        window.location.href = window.location.href.split("?")[0] + "?name=" + sortVal;
    }
});

