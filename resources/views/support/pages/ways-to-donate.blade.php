@include('support.components.head', ['hero' => false, 'title' => 'Ways you can make a donation'])

@include('support.components.cta')

@include('support.components.list', [
    'title' => 'Give in person',
    'items' => [
        'At the Museum using our donation boxes and contactless donation points.',
        'Send a cheque payable to ‘The Fitzwilliam Museum’ and a letter specifying the area you wish to support and post to: Development Office, The Fitzwilliam Museum, Trumpington Street, Cambridge, CB2 1RB',
        'You can ‘Gift Aid’ your donation by downloading and completing this Gift Aid Form and sending it along with your cheque.',
        'Make a gift of quoted shares or securities. Generous tax benefits are available for donors of shares and securities listed on the Stock Exchange. Such gifts are exempt from capital gains tax, and the donor will receive income tax relief on the full market value of shares at the time of sale. Contact the Development Office for more details.',
    ]
])
<div class="text-wrapper">
    @include('support.components.text', ['title' => 'Get involved', 'body' => 'Join the Friends of the Fitzwilliam Museum or become a Marlay Group patron. The annual subscription fee directly benefits the museum.'])

    @include('support.components.text', ['title' => 'Donations via Cambridge in America', 'body' => 'A gift can be made to the Fitzwilliam Museum via Cambridge in America which is a registered 501(c)(3) tax-exempt organisation under the Internal Revenue Code, allowing for US donors to qualify for an income tax deduction to the limits allowed by law.'])

    @include('support.components.text', ['title' => 'Donate an object to the Fitzwilliam Museum', 'body' => 'Please get in touch with the Development Office who can offer advice on how you can make a gift in kind to the Museum.'])
</div>


@include('support.components.related')

