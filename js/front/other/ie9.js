(function () {
    function addEvent(elem, event, fn) {
        if (elem.addEventListener)
            elem.addEventListener(event, fn, false);
        else
            elem.attachEvent("on" + event, function () {
                // set the this pointer same as addEventListener when fn is called
                return (fn.call(elem, window.event));
            });
    };
    function setPlaceholder() {
        this.style.color = '#999';
        this.value = this.getAttribute('placeholder');
    }

    var forms = document.getElementsByTagName('form');
    for (var j = 0; j < forms.length; j++) {
        var inputs = forms[j].elements;
        console.log(inputs);

        for (var i = 0; i < inputs.length; i++) {
            if ((inputs[i].type === 'text' || inputs[i].type === 'textarea') && inputs[i].value === '') {
                setPlaceholder.call(inputs[i]);
                addEvent(inputs[i], 'focus', function () {
                    if (this.value === this.getAttribute('placeholder')) {
                        this.style.color = '';
                        this.value = '';
                    }
                });
                addEvent(inputs[i], 'blur', function () {
                    if (this.value === '') {
                        setPlaceholder.call(this);
                    }
                });
            }
        }
    }
})();