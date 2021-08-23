$j=jQuery.noConflict();
$j(document).ready(function() {
    $('.cpf_cnpj').inputmask({mask: ['999.999.999-99', '99.999.999/9999-99'], keepStatic: true });
    $('.phone_with_ddd').inputmask({mask: ["(99) 9999-9999", "(61) 9 9999-9999"], keepStatic: true});
});
