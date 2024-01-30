@include('support.components.head', ['hero' => false, 'title' => 'Friend membership'])

@include('support.components.featured-image')

@include('support.components.text',[
    'title' => 'Purchase a Gift Membership',
    'body' => 'By gifting a Friend of the Fitzwilliam membership you help ensure our collections and Museum are here for you – and everyone – long into the future. Plus, Friends can enjoy exclusive benefits and discounts.',
    'additionalBody' => 'When you buy a Gift Membership online, we’ll email you a voucher code and instructions for activating the account.'
    ])

@include('support.components.list', [
    'items' => [
        'You share these with the lucky recipient and they have 6 months to activate it.',
        'Once the recipient has activated their account, we’ll send them a membership welcome pack including their membership card(s) in the post'
    ]
])

@include('support.components.list', [
'title' => 'Friends of the Fitzwilliam membership benefits include:',
'items' => [
"An exclusive programme of Friends' events - view forthcoming events now",
"Priority booking for Museum events",
"Unlimited entry to exhibitions without pre-booking",
"Monthly Friends e-newsletter",
"Seasonal 15% offers in the Museum shop*",
"10% discount in The Courtyard Kitchen café",
"10% discount in the Museum shop*"
],
'info' => 'For queries regarding purchasing or renewing a gift membership please contact us:
development@fitzmuseum.cam.ac.uk or call 01223 332 939',
'additional_info' => '*We regret that discounts may not be be used on limited edition prints and some jewellery lines'
])

@include('support.components.payment-grid', ['title' => 'Choose a membership'])

@include('support.components.fiftyfifty')

@include('support.components.faq')

@include('support.components.related')
