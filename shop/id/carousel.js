
// Select all elements with class carousel. 
// forEach carousel, store all carousel items in that carousel into a list called `items`.
// Then, generate HTML for each circular btn by creating a new Array from `items` (e.g. an array of 3 items)
//      This function runs for every item in the list `items`
// This is done to increase flexibility of how many items to put in the carousel, allowing for diff number of items.

document.querySelectorAll(".carousel").forEach((carousel) => {
    const items = carousel.querySelectorAll(".carousel__item");

    // select every single thumbnail button selected
    const buttons = carousel.querySelectorAll(".carousel__button");
    

    // Add event listener for each thumbnail button, index i.
    buttons.forEach((button, i) => {
        button.addEventListener("click", () => {
            // Every time any thumbnail is clicked:
            //      Un-select all the items by removing the class `.carousel__item--selected` forEach item and button
            items.forEach((item) =>
            item.classList.remove("carousel__item--selected")
            );
            buttons.forEach((button) =>
            button.classList.remove("carousel__button--selected")
            );
            
            //      Then add class `carousel__item--selected` for the item i that was clicked
            items[i].classList.add("carousel__item--selected");
            // button.classList.add("carousel__button--selected"); // NOT IN USE: Changes background of selected thumbnail
        });
    });
  
    // Select the first item on page load
    items[0].classList.add("carousel__item--selected");
    buttons[0].classList.add("carousel__button--selected");

});
  