//hide drop downs if mouse clicked outside button and dropdown content
window.onclick = function(event)
{
    if (!event.target.matches("button.dropButton") && !event.target.matches("div.dropdownContent a"))
    {
            closeDropdowns(countMenuButtons());
    }
         
}
    
function onLoad()
{        
        closeDropdowns(countMenuButtons());
}

function countMenuButtons()
{
    var buttons = document.getElementById("mainMenu");
    var count = buttons.childElementCount;

    return count;
}

function closeDropdowns(count)
{
    var i = 0;
    do{
        document.getElementById("myDropdown"+ i).setAttribute("style","display: none");       
        i++;           
    }while (i <= count-1)
}

function onClick(number)
{
    dropDown(number);
    dropdownResize(number);
    hideOtherDropdowns(number);
}

function hideOtherDropdowns(number)
{
    var i = 0;
    do{
        if(i != number)
        {
            document.getElementById("myDropdown"+ i).setAttribute("style","display: none");       
        }
        else{} 
        
        i++;        
    }while (i <= countMenuButtons()-1)
}

function dropDown(number)
{
    var dropdownElement = document.getElementById("myDropdown"+ number);
    var dropdownState = dropdownElement.style.display;

    if (dropdownState == "none")
    {
        dropdownElement.setAttribute("style","display: block");
    }
    else if (dropdownState == "block")
    {
        dropdownElement.setAttribute("style","display: none");
    }    
}

function dropdownResize(number)
{
    var dropdownElement = document.getElementById("myDropdown"+ number);
    var childElements = dropdownElement.children;
    const windowWidth = window.innerWidth;

    
    for(var a of childElements)
    {
        a.setAttribute("style","width:"+((windowWidth/countMenuButtons())-41)+"px");   
    }
    

}

