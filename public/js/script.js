
const toggleClass = (theID,firstClass,secondClass) => {
	let elementID = document.querySelector(theID)
	if (elementID.classList.contains(firstClass)) {
      elementID.classList.remove(firstClass)
      elementID.classList.add(secondClass)
    } else {
      elementID.classList.add(firstClass)
      elementID.classList.remove(secondClass)
    }
}
