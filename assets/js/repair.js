const first = document.getElementsByName('first-value')[0];
const second = document.getElementsByName('second-value')[0];
const initial = second.innerHTML;

// Either hard code this, or get it on page load, just make sure
// it's already available before users start picking values!
const optionMap = {
    FD01: ['i', 'j', 'k'],
    FD02: ['u', 'v', 'w'],
    FD09: ['x', 'y', 'z'],
};

function addOption(selectElement, text) {
    let option = document.createElement('option');
    option.value = text;
    option.textContent = text;
    selectElement.append(option);
}

// Fill the first selector
Object.keys(optionMap).forEach(text => addOption(first, text));

// And only fill the second selector when we know the first value
first.addEventListener('change', evt => {
    second.innerHTML = initial;
    optionMap[evt.target.value].forEach(text => addOption(second, text));
});
select: not(: valid) {
    border: 1px solid red;
}

select: not(: valid) + .followup {
    display: none;
}