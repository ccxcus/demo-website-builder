<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CCXC</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet"/>
    <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">
    <link href="/css/grapesjs-plugin-filestack.css" rel="stylesheet">
</head>
<body style="margin: 0">

<div id="gjs"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
<script src="/js/grapes.min.js" defer></script>
<script src="/js/grapesjs-blocks-basic.min.js" defer></script>
<script src="/js/grapesjs-plugin-forms.min.js" defer></script>
<script src="/js/grapesjs-navbar.min.js" defer></script>
<script src="/js/grapesjs-component-countdown.min.js" defer></script>
<script src="/js/grapesjs-style-gradient.min.js" defer></script>
<script src="/js/grapesjs-plugin-export.min.js" defer></script>
<script src="/js/grapesjs-tui-image-editor.min.js" defer></script>
<script src="/js/grapesjs-style-filter.min.js" defer></script>
<script src="/js/grapesjs-style-bg.min.js" defer></script>
<script src="/js/lory.min.js" defer></script>
<script src="/js/grapesjs-lory-slider.min.js" defer></script>
<script src="/js/grapesjs-tabs.min.js" defer></script>
<script src="/js/grapesjs-tooltip.min.js" defer></script>
<script src="/js/grapesjs-touch.min.js" defer></script>
<script src="/js/grapesjs-parser-postcss.min.js" defer></script>
<script src="/js/grapesjs-preset-webpage.min.js" defer></script>
{{--        <script src="https://feather.aviary.com/imaging/v3/editor.js" defer></script>--}}
{{--        <script src="/js/grapesjs-aviary.min.js" defer></script>--}}
{{--        <script src="/js/grapesjs-plugin-filestack.min.js" defer></script>--}}

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        const  CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        const filterInput = {
            name: 'Filter',
            property: 'filter',
            type: 'filter', // <- the new type
            full: 1,
        };

        const editor = grapesjs.init({
            container : '#gjs',
            components: '{!! $website->body !!}',
            style: '{{ $website->styles }}',
            plugins: [
                "gjs-blocks-basic",
                'grapesjs-plugin-forms',
                'gjs-navbar',
                'gjs-component-countdown',
                'grapesjs-style-gradient',
                'grapesjs-plugin-export',
                'grapesjs-tui-image-editor',
                'grapesjs-style-filter',
                'grapesjs-style-bg',
                'grapesjs-lory-slider',
                'grapesjs-tabs',
                'grapesjs-tooltip',
                'grapesjs-touch',
                'grapesjs-parser-postcss',
                'gjs-preset-webpage',
                //'gjs-aviary',
                //'gjs-plugin-filestack',
            ],
            pluginsOpts: {
                'grapesjs-tui-image-editor': {
                    config: {
                        includeUI: {
                            initMenu: 'filter',
                        },
                    },
                    icons: {
                        'menu.normalIcon.path': '../icon-d.svg',
                        'menu.activeIcon.path': '../icon-b.svg',
                        'menu.disabledIcon.path': '../icon-a.svg',
                        'menu.hoverIcon.path': '../icon-c.svg',
                        'submenu.normalIcon.path': '../icon-d.svg',
                        'submenu.activeIcon.path': '../icon-c.svg',
                    },
                },
                'grapesjs-tabs': {
                    tabsBlock: {
                        category: 'Extra'
                    }
                },
                'gjs-preset-webpage': {
                    modalImportTitle: 'Import Template',
                    modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Pegue aqu?? su HTML / CSS y haga clic en Importar</div>',
                    modalImportContent: function(editor) {
                        return editor.getHtml() + '<style>'+editor.getCss()+'</style>'
                    },
                    filestackOpts: null, //{ key: 'AYmqZc2e8RLGLE7TGkX3Hz' },
                    aviaryOpts: false,
                    blocksBasicOpts: { flexGrid: 1 },
                    customStyleManager: [
                        {
                            name: 'General',
                            buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom'],
                            properties:[
                                {
                                    name: 'Alineaci??n',
                                    property: 'float',
                                    type: 'radio',
                                    defaults: 'none',
                                    list: [
                                        { value: 'none', className: 'fa fa-times'},
                                        { value: 'left', className: 'fa fa-align-left'},
                                        { value: 'right', className: 'fa fa-align-right'}
                                    ],
                                },
                                { property: 'position', type: 'select'}
                            ],
                        },
                        {
                            name: 'Dimensi??n',
                            open: false,
                            buildProps: ['width', 'flex-width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
                            properties: [
                                {
                                    id: 'flex-width',
                                    type: 'integer',
                                    name: 'Ancho',
                                    units: ['px', '%'],
                                    property: 'flex-basis',
                                    toRequire: 1,
                                },
                                {
                                    property: 'margin',
                                    properties:[
                                        { name: 'Arriba', property: 'margin-top'},
                                        { name: 'Derecha', property: 'margin-right'},
                                        { name: 'Abajo', property: 'margin-bottom'},
                                        { name: 'Izquierda', property: 'margin-left'}
                                    ],
                                },
                                {
                                    property  : 'padding',
                                    properties:[
                                        { name: 'Arriba', property: 'padding-top'},
                                        { name: 'Derecha', property: 'padding-right'},
                                        { name: 'Abajo', property: 'padding-bottom'},
                                        { name: 'Izquierda', property: 'padding-left'}
                                    ],
                                }
                            ],
                        },
                        {
                            name: 'Tipograf??a',
                            open: false,
                            buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-decoration', 'text-shadow'],
                            properties:[
                                { name: 'Fuente', property: 'font-family'},
                                { name: 'Peso', property: 'font-weight'},
                                { name: 'Color de fuente', property: 'color'},
                                {
                                    property: 'text-align',
                                    type: 'radio',
                                    defaults: 'left',
                                    list: [
                                        { value : 'left',  name : 'Izquierda',    className: 'fa fa-align-left'},
                                        { value : 'center',  name : 'Centro',  className: 'fa fa-align-center' },
                                        { value : 'right',   name : 'Derecha',   className: 'fa fa-align-right'},
                                        { value : 'justify', name : 'Justificado',   className: 'fa fa-align-justify'}
                                    ],
                                },
                                {
                                    property: 'text-decoration',
                                    type: 'radio',
                                    defaults: 'none',
                                    list: [
                                        { value: 'none', name: 'Ninguno', className: 'fa fa-times'},
                                        { value: 'underline', name: 'Subrayar', className: 'fa fa-underline' },
                                        { value: 'line-through', name: 'L??nea a trav??s', className: 'fa fa-strikethrough'}
                                    ],
                                },
                                {
                                    property: 'text-shadow',
                                    properties: [
                                        { name: 'Posici??n X', property: 'text-shadow-h'},
                                        { name: 'Posici??n Y', property: 'text-shadow-v'},
                                        { name: 'Difuminar', property: 'text-shadow-blur'},
                                        { name: 'Color', property: 'text-shadow-color'}
                                    ],
                                }
                            ],
                        },
                        {
                            name: 'Decoraciones',
                            open: false,
                            buildProps: ['opacity', 'border-radius', 'border', 'box-shadow', 'background-bg'],
                            properties: [
                                {
                                    type: 'slider',
                                    property: 'opacity',
                                    defaults: 1,
                                    step: 0.01,
                                    max: 1,
                                    min:0,
                                },
                                {
                                    property: 'border-radius',
                                    properties  : [
                                        { name: 'Arriba', property: 'border-top-left-radius'},
                                        { name: 'Derecha', property: 'border-top-right-radius'},
                                        { name: 'Abajo', property: 'border-bottom-left-radius'},
                                        { name: 'Izquierda', property: 'border-bottom-right-radius'}
                                    ],
                                },
                                {
                                    property: 'box-shadow',
                                    properties: [
                                        { name: 'Posici??n X', property: 'box-shadow-h'},
                                        { name: 'Posici??n Y', property: 'box-shadow-v'},
                                        { name: 'Difuminar', property: 'box-shadow-blur'},
                                        { name: 'Propagar', property: 'box-shadow-spread'},
                                        { name: 'Color', property: 'box-shadow-color'},
                                        { name: 'Tipo de sombra', property: 'box-shadow-type'}
                                    ],
                                },
                                {
                                    id: 'background-bg',
                                    property: 'background',
                                    type: 'bg',
                                },
                            ],
                        },
                        {
                            name: 'Extra',
                            open: false,
                            buildProps: ['transition', 'perspective', 'transform'],
                            properties: [
                                {
                                    property: 'transition',
                                    properties:[
                                        { name: 'Propiedad', property: 'transition-property'},
                                        { name: 'Duraci??n', property: 'transition-duration'},
                                        { name: 'Alivio', property: 'transition-timing-function'}
                                    ],
                                },
                                {
                                property: 'transform',
                                    properties:[
                                        { name: 'Girar X', property: 'transform-rotate-x'},
                                        { name: 'Girar Y', property: 'transform-rotate-y'},
                                        { name: 'Girar Z', property: 'transform-rotate-z'},
                                        { name: 'Escala X', property: 'transform-scale-x'},
                                        { name: 'Escala Y', property: 'transform-scale-y'},
                                        { name: 'Escala Z', property: 'transform-scale-z'}
                                    ],
                                }
                            ]
                        },
                        {
                            name: 'Flex',
                            open: false,
                            properties: [
                                {
                                    name: 'Contenedor Flex',
                                    property: 'display',
                                    type: 'select',
                                    defaults: 'block',
                                    list: [
                                        { value: 'block', name: 'Desactivar'},
                                        { value: 'flex', name: 'Activar'}
                                    ],
                                },
                                {
                                    name: 'Padre Flex',
                                    property: 'label-parent-flex',
                                    type: 'integer',
                                },
                                {
                                    name      : 'Direcci??n',
                                    property  : 'flex-direction',
                                    type    : 'radio',
                                    defaults  : 'row',
                                    list    : [
                                        {
                                            value   : 'row',
                                            name    : 'Fila',
                                            className : 'icons-flex icon-dir-row',
                                            title   : 'Fila',
                                        },
                                        {
                                            value   : 'row-reverse',
                                            name    : 'Fila reversa',
                                            className : 'icons-flex icon-dir-row-rev',
                                            title   : 'Fila reversa',
                                        },
                                        {
                                            value   : 'column',
                                            name    : 'Columna',
                                            title   : 'Columna',
                                            className : 'icons-flex icon-dir-col',
                                        },
                                        {
                                            value   : 'column-reverse',
                                            name    : 'Columna inversa',
                                            title   : 'Columna inversa',
                                            className : 'icons-flex icon-dir-col-rev',
                                        }
                                    ],
                                },
                                {
                                    name      : 'Justificar',
                                    property  : 'justify-content',
                                    type    : 'radio',
                                    defaults  : 'flex-start',
                                    list    : [
                                        {
                                            value   : 'flex-start',
                                            className : 'icons-flex icon-just-start',
                                            title   : 'Comienzo',
                                        },
                                        {
                                            value   : 'flex-end',
                                            title    : 'Final',
                                            className : 'icons-flex icon-just-end',
                                        },
                                        {
                                            value   : 'space-between',
                                            title    : 'Espacio entre',
                                            className : 'icons-flex icon-just-sp-bet',
                                        },
                                        {
                                            value   : 'space-around',
                                            title    : 'Espacio alrededor',
                                            className : 'icons-flex icon-just-sp-ar',
                                        },
                                        {
                                            value   : 'center',
                                            title    : 'Centro',
                                            className : 'icons-flex icon-just-sp-cent',
                                        }
                                    ],
                                },
                                {
                                    name      : 'Alineaci??n',
                                    property  : 'align-items',
                                    type    : 'radio',
                                    defaults  : 'center',
                                    list    : [
                                        {
                                            value   : 'flex-start',
                                            title    : 'Comienzo',
                                            className : 'icons-flex icon-al-start',
                                        },
                                        {
                                            value   : 'flex-end',
                                            title    : 'Final',
                                            className : 'icons-flex icon-al-end',
                                        },
                                        {
                                            value   : 'stretch',
                                            title    : 'Estirarse',
                                            className : 'icons-flex icon-al-str',
                                        },
                                        {
                                            value   : 'center',
                                            title    : 'Centrar',
                                            className : 'icons-flex icon-al-center',
                                        }
                                    ],
                                },
                                {
                                    name: 'Hijos flexibles',
                                    property: 'label-parent-flex',
                                    type: 'integer',
                                },
                                {
                                    name:     'Orden',
                                    property:   'order',
                                    type:     'integer',
                                    defaults :  0,
                                    min: 0
                                },
                                {
                                    name: 'Flex',
                                    property: 'flex',
                                    type: 'composite',
                                    properties: [
                                        {
                                            name:     'Crecer',
                                            property:   'flex-grow',
                                            type:     'integer',
                                            defaults :  0,
                                            min: 0
                                        },
                                        {
                                            name:     'Encogerse',
                                            property:   'flex-shrink',
                                            type:     'integer',
                                            defaults :  0,
                                            min: 0
                                        },
                                        {
                                            name:     'Base',
                                            property:   'flex-basis',
                                            type:     'integer',
                                            units:    ['px','%',''],
                                            unit: '',
                                            defaults :  'auto',
                                        }
                                    ],
                                },
                                {
                                    name: 'Alineaci??n',
                                    property: 'align-self',
                                    type: 'radio',
                                    defaults: 'auto',
                                    list: [
                                        {
                                            value   : 'auto',
                                            name    : 'Auto',
                                        },
                                        {
                                            value   : 'flex-start',
                                            title    : 'Comienzo',
                                            className : 'icons-flex icon-al-start',
                                        },
                                        {
                                            value   : 'flex-end',
                                            title    : 'Final',
                                            className : 'icons-flex icon-al-end',
                                        },
                                        {
                                            value   : 'stretch',
                                            title    : 'Estirarse',
                                            className : 'icons-flex icon-al-str',
                                        },
                                        {
                                            value   : 'center',
                                            title    : 'Centrar',
                                            className : 'icons-flex icon-al-center',
                                        }
                                    ],
                                }
                            ]
                        }
                    ],
                },
            },
            storageManager: { type: 'simple-storage' },
        });

        const SimpleStorage = {};

        editor.StorageManager.add('simple-storage', {
            /**
             * Load the data
             * @param  {Array} keys Array containing values to load, eg, ['gjs-components', 'gjs-styles', ...]
             * @param  {Function} clb Callback function to call when the load is ended
             * @param  {Function} clbErr Callback function to call in case of errors
             */
            load(keys, clb, clbErr) {
                const result = {};

                keys.forEach(key => {
                    const value = SimpleStorage[key];
                    if (value) {
                        result[key] = value;
                    }
                });

                // Might be called inside some async method
                clb(result);
            },

            /**
             * Store the data
             * @param  {Object} data Data object to store
             * @param  {Function} clb Callback function to call when the load is ended
             * @param  {Function} clbErr Callback function to call in case of errors
             */
            store(data, clb, clbErr) {
                console.log('data', data)

                for (let key in data) {
                    SimpleStorage[key] = data[key];
                }

                $.ajax({
                    url: '{{ route('websites.edit-web', $website->id) }}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        data: data,
                    },
                    success: function(response){

                        // Might be called inside some async method
                        clb();
                    }
                });

            }
        });
    });
</script>

{{--<script type="text/javascript">
    var lp = './img/';
    var plp = '//placehold.it/350x250/';
    var images = [
        lp+'team1.jpg', lp+'team2.jpg', lp+'team3.jpg', plp+'78c5d6/fff/image1.jpg', plp+'459ba8/fff/image2.jpg', plp+'79c267/fff/image3.jpg',
        plp+'c5d647/fff/image4.jpg', plp+'f28c33/fff/image5.jpg', plp+'e868a2/fff/image6.jpg', plp+'cc4360/fff/image7.jpg',
        lp+'work-desk.jpg', lp+'phone-app.png', lp+'bg-gr-v.png'
    ];

    var editor  = grapesjs.init({
        avoidInlineStyle: 1,
        height: '100%',
        container : '#gjs',
        fromElement: 1,
        showOffsets: 1,
        assetManager: {
            embedAsBase64: 1,
            assets: images
        },
        selectorManager: { componentFirst: true },
        styleManager: { clearProperties: 1 },
        plugins: [
            'grapesjs-lory-slider',
            'grapesjs-tabs',
            'grapesjs-custom-code',
            'grapesjs-touch',
            'grapesjs-parser-postcss',
            'grapesjs-tooltip',
            'grapesjs-tui-image-editor',
            'grapesjs-typed',
            'grapesjs-style-bg',
            'gjs-preset-webpage',
        ],
        pluginsOpts: {
            'grapesjs-lory-slider': {
                sliderBlock: {
                    category: 'Extra'
                }
            },
            'grapesjs-tabs': {
                tabsBlock: {
                    category: 'Extra'
                }
            },
            'grapesjs-typed': {
                block: {
                    category: 'Extra',
                    content: {
                        type: 'typed',
                        'type-speed': 40,
                        strings: [
                            'Text row one',
                            'Text row two',
                            'Text row three',
                        ],
                    }
                }
            },
            'gjs-preset-webpage': {
                modalImportTitle: 'Import Template',
                modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Paste here your HTML/CSS and click Import</div>',
                modalImportContent: function(editor) {
                    return editor.getHtml() + '<style>'+editor.getCss()+'</style>'
                },
                filestackOpts: null, //{ key: 'AYmqZc2e8RLGLE7TGkX3Hz' },
                aviaryOpts: false,
                blocksBasicOpts: { flexGrid: 1 },
                customStyleManager: [{
                    name: 'General',
                    buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom'],
                    properties:[{
                        name: 'Alignment',
                        property: 'float',
                        type: 'radio',
                        defaults: 'none',
                        list: [
                            { value: 'none', className: 'fa fa-times'},
                            { value: 'left', className: 'fa fa-align-left'},
                            { value: 'right', className: 'fa fa-align-right'}
                        ],
                    },
                        { property: 'position', type: 'select'}
                    ],
                },{
                    name: 'Dimension',
                    open: false,
                    buildProps: ['width', 'flex-width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
                    properties: [{
                        id: 'flex-width',
                        type: 'integer',
                        name: 'Width',
                        units: ['px', '%'],
                        property: 'flex-basis',
                        toRequire: 1,
                    },{
                        property: 'margin',
                        properties:[
                            { name: 'Top', property: 'margin-top'},
                            { name: 'Right', property: 'margin-right'},
                            { name: 'Bottom', property: 'margin-bottom'},
                            { name: 'Left', property: 'margin-left'}
                        ],
                    },{
                        property  : 'padding',
                        properties:[
                            { name: 'Top', property: 'padding-top'},
                            { name: 'Right', property: 'padding-right'},
                            { name: 'Bottom', property: 'padding-bottom'},
                            { name: 'Left', property: 'padding-left'}
                        ],
                    }],
                },{
                    name: 'Typography',
                    open: false,
                    buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-decoration', 'text-shadow'],
                    properties:[
                        { name: 'Font', property: 'font-family'},
                        { name: 'Weight', property: 'font-weight'},
                        { name:  'Font color', property: 'color'},
                        {
                            property: 'text-align',
                            type: 'radio',
                            defaults: 'left',
                            list: [
                                { value : 'left',  name : 'Left',    className: 'fa fa-align-left'},
                                { value : 'center',  name : 'Center',  className: 'fa fa-align-center' },
                                { value : 'right',   name : 'Right',   className: 'fa fa-align-right'},
                                { value : 'justify', name : 'Justify',   className: 'fa fa-align-justify'}
                            ],
                        },{
                            property: 'text-decoration',
                            type: 'radio',
                            defaults: 'none',
                            list: [
                                { value: 'none', name: 'None', className: 'fa fa-times'},
                                { value: 'underline', name: 'underline', className: 'fa fa-underline' },
                                { value: 'line-through', name: 'Line-through', className: 'fa fa-strikethrough'}
                            ],
                        },{
                            property: 'text-shadow',
                            properties: [
                                { name: 'X position', property: 'text-shadow-h'},
                                { name: 'Y position', property: 'text-shadow-v'},
                                { name: 'Blur', property: 'text-shadow-blur'},
                                { name: 'Color', property: 'text-shadow-color'}
                            ],
                        }],
                },{
                    name: 'Decorations',
                    open: false,
                    buildProps: ['opacity', 'border-radius', 'border', 'box-shadow', 'background-bg'],
                    properties: [{
                        type: 'slider',
                        property: 'opacity',
                        defaults: 1,
                        step: 0.01,
                        max: 1,
                        min:0,
                    },{
                        property: 'border-radius',
                        properties  : [
                            { name: 'Top', property: 'border-top-left-radius'},
                            { name: 'Right', property: 'border-top-right-radius'},
                            { name: 'Bottom', property: 'border-bottom-left-radius'},
                            { name: 'Left', property: 'border-bottom-right-radius'}
                        ],
                    },{
                        property: 'box-shadow',
                        properties: [
                            { name: 'X position', property: 'box-shadow-h'},
                            { name: 'Y position', property: 'box-shadow-v'},
                            { name: 'Blur', property: 'box-shadow-blur'},
                            { name: 'Spread', property: 'box-shadow-spread'},
                            { name: 'Color', property: 'box-shadow-color'},
                            { name: 'Shadow type', property: 'box-shadow-type'}
                        ],
                    },{
                        id: 'background-bg',
                        property: 'background',
                        type: 'bg',
                    },],
                },{
                    name: 'Extra',
                    open: false,
                    buildProps: ['transition', 'perspective', 'transform'],
                    properties: [{
                        property: 'transition',
                        properties:[
                            { name: 'Property', property: 'transition-property'},
                            { name: 'Duration', property: 'transition-duration'},
                            { name: 'Easing', property: 'transition-timing-function'}
                        ],
                    },{
                        property: 'transform',
                        properties:[
                            { name: 'Rotate X', property: 'transform-rotate-x'},
                            { name: 'Rotate Y', property: 'transform-rotate-y'},
                            { name: 'Rotate Z', property: 'transform-rotate-z'},
                            { name: 'Scale X', property: 'transform-scale-x'},
                            { name: 'Scale Y', property: 'transform-scale-y'},
                            { name: 'Scale Z', property: 'transform-scale-z'}
                        ],
                    }]
                },{
                    name: 'Flex',
                    open: false,
                    properties: [{
                        name: 'Flex Container',
                        property: 'display',
                        type: 'select',
                        defaults: 'block',
                        list: [
                            { value: 'block', name: 'Disable'},
                            { value: 'flex', name: 'Enable'}
                        ],
                    },{
                        name: 'Flex Parent',
                        property: 'label-parent-flex',
                        type: 'integer',
                    },{
                        name      : 'Direction',
                        property  : 'flex-direction',
                        type    : 'radio',
                        defaults  : 'row',
                        list    : [{
                            value   : 'row',
                            name    : 'Row',
                            className : 'icons-flex icon-dir-row',
                            title   : 'Row',
                        },{
                            value   : 'row-reverse',
                            name    : 'Row reverse',
                            className : 'icons-flex icon-dir-row-rev',
                            title   : 'Row reverse',
                        },{
                            value   : 'column',
                            name    : 'Column',
                            title   : 'Column',
                            className : 'icons-flex icon-dir-col',
                        },{
                            value   : 'column-reverse',
                            name    : 'Column reverse',
                            title   : 'Column reverse',
                            className : 'icons-flex icon-dir-col-rev',
                        }],
                    },{
                        name      : 'Justify',
                        property  : 'justify-content',
                        type    : 'radio',
                        defaults  : 'flex-start',
                        list    : [{
                            value   : 'flex-start',
                            className : 'icons-flex icon-just-start',
                            title   : 'Start',
                        },{
                            value   : 'flex-end',
                            title    : 'End',
                            className : 'icons-flex icon-just-end',
                        },{
                            value   : 'space-between',
                            title    : 'Space between',
                            className : 'icons-flex icon-just-sp-bet',
                        },{
                            value   : 'space-around',
                            title    : 'Space around',
                            className : 'icons-flex icon-just-sp-ar',
                        },{
                            value   : 'center',
                            title    : 'Center',
                            className : 'icons-flex icon-just-sp-cent',
                        }],
                    },{
                        name      : 'Align',
                        property  : 'align-items',
                        type    : 'radio',
                        defaults  : 'center',
                        list    : [{
                            value   : 'flex-start',
                            title    : 'Start',
                            className : 'icons-flex icon-al-start',
                        },{
                            value   : 'flex-end',
                            title    : 'End',
                            className : 'icons-flex icon-al-end',
                        },{
                            value   : 'stretch',
                            title    : 'Stretch',
                            className : 'icons-flex icon-al-str',
                        },{
                            value   : 'center',
                            title    : 'Center',
                            className : 'icons-flex icon-al-center',
                        }],
                    },{
                        name: 'Flex Children',
                        property: 'label-parent-flex',
                        type: 'integer',
                    },{
                        name:     'Order',
                        property:   'order',
                        type:     'integer',
                        defaults :  0,
                        min: 0
                    },{
                        name    : 'Flex',
                        property  : 'flex',
                        type    : 'composite',
                        properties  : [{
                            name:     'Grow',
                            property:   'flex-grow',
                            type:     'integer',
                            defaults :  0,
                            min: 0
                        },{
                            name:     'Shrink',
                            property:   'flex-shrink',
                            type:     'integer',
                            defaults :  0,
                            min: 0
                        },{
                            name:     'Basis',
                            property:   'flex-basis',
                            type:     'integer',
                            units:    ['px','%',''],
                            unit: '',
                            defaults :  'auto',
                        }],
                    },{
                        name      : 'Align',
                        property  : 'align-self',
                        type      : 'radio',
                        defaults  : 'auto',
                        list    : [{
                            value   : 'auto',
                            name    : 'Auto',
                        },{
                            value   : 'flex-start',
                            title    : 'Start',
                            className : 'icons-flex icon-al-start',
                        },{
                            value   : 'flex-end',
                            title    : 'End',
                            className : 'icons-flex icon-al-end',
                        },{
                            value   : 'stretch',
                            title    : 'Stretch',
                            className : 'icons-flex icon-al-str',
                        },{
                            value   : 'center',
                            title    : 'Center',
                            className : 'icons-flex icon-al-center',
                        }],
                    }]
                }
                ],
            },
        },
    });

    editor.I18n.addMessages({
        en: {
            styleManager: {
                properties: {
                    'background-repeat': 'Repeat',
                    'background-position': 'Position',
                    'background-attachment': 'Attachment',
                    'background-size': 'Size',
                }
            },
        }
    });

    var pn = editor.Panels;
    var modal = editor.Modal;
    var cmdm = editor.Commands;
    cmdm.add('canvas-clear', function() {
        if(confirm('Areeee you sure to clean the canvas?')) {
            var comps = editor.DomComponents.clear();
            setTimeout(function(){ localStorage.clear()}, 0)
        }
    });
    cmdm.add('set-device-desktop', {
        run: function(ed) { ed.setDevice('Desktop') },
        stop: function() {},
    });
    cmdm.add('set-device-tablet', {
        run: function(ed) { ed.setDevice('Tablet') },
        stop: function() {},
    });
    cmdm.add('set-device-mobile', {
        run: function(ed) { ed.setDevice('Mobile portrait') },
        stop: function() {},
    });



    // Add info command
    var mdlClass = 'gjs-mdl-dialog-sm';
    var infoContainer = document.getElementById('info-panel');
    cmdm.add('open-info', function() {
        var mdlDialog = document.querySelector('.gjs-mdl-dialog');
        mdlDialog.className += ' ' + mdlClass;
        infoContainer.style.display = 'block';
        modal.setTitle('About this demo');
        modal.setContent(infoContainer);
        modal.open();
        modal.getModel().once('change:open', function() {
            mdlDialog.className = mdlDialog.className.replace(mdlClass, '');
        })
    });
    pn.addButton('options', {
        id: 'open-info',
        className: 'fa fa-question-circle',
        command: function() { editor.runCommand('open-info') },
        attributes: {
            'title': 'About',
            'data-tooltip-pos': 'bottom',
        },
    });


    // Simple warn notifier
    var origWarn = console.warn;
    toastr.options = {
        closeButton: true,
        preventDuplicates: true,
        showDuration: 250,
        hideDuration: 150
    };
    console.warn = function (msg) {
        if (msg.indexOf('[undefined]') == -1) {
            toastr.warning(msg);
        }
        origWarn(msg);
    };


    // Add and beautify tooltips
    [['sw-visibility', 'Show Borders'], ['preview', 'Preview'], ['fullscreen', 'Fullscreen'],
        ['export-template', 'Export'], ['undo', 'Undo'], ['redo', 'Redo'],
        ['gjs-open-import-webpage', 'Import'], ['canvas-clear', 'Clear canvas']]
        .forEach(function(item) {
            pn.getButton('options', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
        });
    [['open-sm', 'Style Manager'], ['open-layers', 'Layers'], ['open-blocks', 'Blocks']]
        .forEach(function(item) {
            pn.getButton('views', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
        });
    var titles = document.querySelectorAll('*[title]');

    for (var i = 0; i < titles.length; i++) {
        var el = titles[i];
        var title = el.getAttribute('title');
        title = title ? title.trim(): '';
        if(!title)
            break;
        el.setAttribute('data-tooltip', title);
        el.setAttribute('title', '');
    }

    // Show borders by default
    pn.getButton('options', 'sw-visibility').set('active', 1);


    // Store and load events
    editor.on('storage:load', function(e) { console.log('Loaded ', e) });
    editor.on('storage:store', function(e) { console.log('Stored ', e) });


    // Do stuff on load
    editor.on('load', function() {
        var $ = grapesjs.$;

        // Show logo with the version
        var logoCont = document.querySelector('.gjs-logo-cont');
        document.querySelector('.gjs-logo-version').innerHTML = 'v' + grapesjs.version;
        var logoPanel = document.querySelector('.gjs-pn-commands');
        logoPanel.appendChild(logoCont);


        // Load and show settings and style manager
        var openTmBtn = pn.getButton('views', 'open-tm');
        openTmBtn && openTmBtn.set('active', 1);
        var openSm = pn.getButton('views', 'open-sm');
        openSm && openSm.set('active', 1);

        // Add Settings Sector
        var traitsSector = $('<div class="gjs-sm-sector no-select">'+
            '<div class="gjs-sm-title"><span class="icon-settings fa fa-cog"></span> Settings</div>' +
            '<div class="gjs-sm-properties" style="display: none;"></div></div>');
        var traitsProps = traitsSector.find('.gjs-sm-properties');
        traitsProps.append($('.gjs-trt-traits'));
        $('.gjs-sm-sectors').before(traitsSector);
        traitsSector.find('.gjs-sm-title').on('click', function(){
            var traitStyle = traitsProps.get(0).style;
            var hidden = traitStyle.display == 'none';
            if (hidden) {
                traitStyle.display = 'block';
            } else {
                traitStyle.display = 'none';
            }
        });

        // Open block manager
        var openBlocksBtn = editor.Panels.getButton('views', 'open-blocks');
        openBlocksBtn && openBlocksBtn.set('active', 1);

        // Move Ad
        $('#gjs').append($('.ad-cont'));
    });
</script>--}}
</body>
</html>
