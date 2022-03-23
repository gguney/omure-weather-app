
function addLoader(element){
    element.classList.add("is-loading");
}

function removeloader(element){
    element.classList.remove("is-loading");
}

export default {
    inserted: function (el, binding) {
        if (binding.value || typeof binding.value === "undefined") {
            addLoader(el)
        } else {
            removeloader(el)
        }
    },
    update: function (el, binding) {
        if (binding.value){
            addLoader(el)
        }
        else {
            removeloader(el)
        }
    }
};
