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
                    modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Pegue aquí su HTML / CSS y haga clic en Importar</div>',
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
                                    name: 'Alineación',
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
                            name: 'Dimensión',
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
                            name: 'Tipografía',
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
                                        { value: 'line-through', name: 'Línea a través', className: 'fa fa-strikethrough'}
                                    ],
                                },
                                {
                                    property: 'text-shadow',
                                    properties: [
                                        { name: 'Posición X', property: 'text-shadow-h'},
                                        { name: 'Posición Y', property: 'text-shadow-v'},
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
                                        { name: 'Posición X', property: 'box-shadow-h'},
                                        { name: 'Posición Y', property: 'box-shadow-v'},
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
                                        { name: 'Duración', property: 'transition-duration'},
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
                                    name      : 'Dirección',
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
                                    name      : 'Alineación',
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
                                    name: 'Alineación',
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
</body>
</html>
