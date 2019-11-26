<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TAMED | Activa tu hogar</title>
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" type="image/ico" href="{{ asset('images/favicon.png') }}" />

  <!-- Custom fonts for this template-->
  <link href="{{ asset('inmobiliarias/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('inmobiliarias/css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang-all.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
  <style>
          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Italic'), local('GoogleSans-Italic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaErENHsxJlGDuGo1OIlL3L8phULjtH.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Italic'), local('GoogleSans-Italic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaErENHsxJlGDuGo1OIlL3L8p9ULjtH.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Italic'), local('GoogleSans-Italic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaErENHsxJlGDuGo1OIlL3L8pJULjtH.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            font-display: fallback;
            src: local('Google Sans Italic'), local('GoogleSans-Italic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaErENHsxJlGDuGo1OIlL3L8pxULg.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Medium Italic'), local('GoogleSans-MediumItalic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaZrENHsxJlGDuGo1OIlL3L-m93OwBmO24p.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Medium Italic'), local('GoogleSans-MediumItalic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaZrENHsxJlGDuGo1OIlL3L-m93OwdmO24p.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Medium Italic'), local('GoogleSans-MediumItalic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaZrENHsxJlGDuGo1OIlL3L-m93OwpmO24p.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Medium Italic'), local('GoogleSans-MediumItalic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaZrENHsxJlGDuGo1OIlL3L-m93OwRmOw.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Bold Italic'), local('GoogleSans-BoldItalic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaZrENHsxJlGDuGo1OIlL3L-idxOwBmO24p.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Bold Italic'), local('GoogleSans-BoldItalic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaZrENHsxJlGDuGo1OIlL3L-idxOwdmO24p.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Bold Italic'), local('GoogleSans-BoldItalic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaZrENHsxJlGDuGo1OIlL3L-idxOwpmO24p.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: italic;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Bold Italic'), local('GoogleSans-BoldItalic'), url(//fonts.gstatic.com/s/googlesans/v9/4UaZrENHsxJlGDuGo1OIlL3L-idxOwRmOw.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Regular'), local('GoogleSans-Regular'), url(//fonts.gstatic.com/s/googlesans/v9/4UaGrENHsxJlGDuGo1OIlL3Kwp5MKg.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Regular'), local('GoogleSans-Regular'), url(//fonts.gstatic.com/s/googlesans/v9/4UaGrENHsxJlGDuGo1OIlL3Nwp5MKg.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Regular'), local('GoogleSans-Regular'), url(//fonts.gstatic.com/s/googlesans/v9/4UaGrENHsxJlGDuGo1OIlL3Awp5MKg.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Regular'), local('GoogleSans-Regular'), url(//fonts.gstatic.com/s/googlesans/v9/4UaGrENHsxJlGDuGo1OIlL3Owp4.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Medium'), local('GoogleSans-Medium'), url(//fonts.gstatic.com/s/googlesans/v9/4UabrENHsxJlGDuGo1OIlLU94Yt3CwZ-Pw.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Medium'), local('GoogleSans-Medium'), url(//fonts.gstatic.com/s/googlesans/v9/4UabrENHsxJlGDuGo1OIlLU94YtwCwZ-Pw.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Medium'), local('GoogleSans-Medium'), url(//fonts.gstatic.com/s/googlesans/v9/4UabrENHsxJlGDuGo1OIlLU94Yt9CwZ-Pw.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Medium'), local('GoogleSans-Medium'), url(//fonts.gstatic.com/s/googlesans/v9/4UabrENHsxJlGDuGo1OIlLU94YtzCwY.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Bold'), local('GoogleSans-Bold'), url(//fonts.gstatic.com/s/googlesans/v9/4UabrENHsxJlGDuGo1OIlLV154t3CwZ-Pw.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Bold'), local('GoogleSans-Bold'), url(//fonts.gstatic.com/s/googlesans/v9/4UabrENHsxJlGDuGo1OIlLV154twCwZ-Pw.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Bold'), local('GoogleSans-Bold'), url(//fonts.gstatic.com/s/googlesans/v9/4UabrENHsxJlGDuGo1OIlLV154t9CwZ-Pw.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans';
            font-style: normal;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Bold'), local('GoogleSans-Bold'), url(//fonts.gstatic.com/s/googlesans/v9/4UabrENHsxJlGDuGo1OIlLV154tzCwY.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Display Italic'), local('GoogleSansDisplay-Italic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8HacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvNpzfecZU.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Display Italic'), local('GoogleSansDisplay-Italic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8HacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvNoDfecZU.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Display Italic'), local('GoogleSansDisplay-Italic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8HacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvNrTfecZU.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Display Italic'), local('GoogleSansDisplay-Italic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8HacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvNozfe.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 500;
            font-display: fallback;

            src: local('Google Sans Display Medium Italic'), local('GoogleSansDisplay-MediumItalic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8KacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvFUBTLSrR5DQA.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Display Medium Italic'), local('GoogleSansDisplay-MediumItalic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8KacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvFUBTLTbR5DQA.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Display Medium Italic'), local('GoogleSansDisplay-MediumItalic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8KacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvFUBTLQLR5DQA.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Display Medium Italic'), local('GoogleSansDisplay-MediumItalic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8KacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvFUBTLTrR5.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Display Bold Italic'), local('GoogleSansDisplay-BoldItalic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8KacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvFGBLLSrR5DQA.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Display Bold Italic'), local('GoogleSansDisplay-BoldItalic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8KacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvFGBLLTbR5DQA.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Display Bold Italic'), local('GoogleSansDisplay-BoldItalic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8KacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvFGBLLQLR5DQA.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: italic;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Display Bold Italic'), local('GoogleSansDisplay-BoldItalic'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8KacM9Wef3EJPWRrHjgE4B6CnlZxHVDvvFGBLLTrR5.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Display Regular'), local('GoogleSansDisplay-Regular'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8FacM9Wef3EJPWRrHjgE4B6CnlZxHVDvr9oS_a.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Display Regular'), local('GoogleSansDisplay-Regular'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8FacM9Wef3EJPWRrHjgE4B6CnlZxHVDv39oS_a.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Display Regular'), local('GoogleSansDisplay-Regular'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8FacM9Wef3EJPWRrHjgE4B6CnlZxHVDvD9oS_a.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 400;
            font-display: fallback;
            src: local('Google Sans Display Regular'), local('GoogleSansDisplay-Regular'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8FacM9Wef3EJPWRrHjgE4B6CnlZxHVDv79oQ.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Display Medium'), local('GoogleSansDisplay-Medium'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8IacM9Wef3EJPWRrHjgE4B6CnlZxHVBg3etBT7TKx9.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Display Medium'), local('GoogleSansDisplay-Medium'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8IacM9Wef3EJPWRrHjgE4B6CnlZxHVBg3etBP7TKx9.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Display Medium'), local('GoogleSansDisplay-Medium'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8IacM9Wef3EJPWRrHjgE4B6CnlZxHVBg3etB77TKx9.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 500;
            font-display: fallback;
            src: local('Google Sans Display Medium'), local('GoogleSansDisplay-Medium'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8IacM9Wef3EJPWRrHjgE4B6CnlZxHVBg3etBD7TA.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Display Bold'), local('GoogleSansDisplay-Bold'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8IacM9Wef3EJPWRrHjgE4B6CnlZxHVBkXYtBT7TKx9.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Display Bold'), local('GoogleSansDisplay-Bold'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8IacM9Wef3EJPWRrHjgE4B6CnlZxHVBkXYtBP7TKx9.woff2)format('woff2');
            unicode-range: U+0370-03FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Display Bold'), local('GoogleSansDisplay-Bold'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8IacM9Wef3EJPWRrHjgE4B6CnlZxHVBkXYtB77TKx9.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
          }

          @font-face {
            font-family: 'Google Sans Display';
            font-style: normal;
            font-weight: 700;
            font-display: fallback;
            src: local('Google Sans Display Bold'), local('GoogleSansDisplay-Bold'), url(//fonts.gstatic.com/s/googlesansdisplay/v8/ea8IacM9Wef3EJPWRrHjgE4B6CnlZxHVBkXYtBD7TA.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
          }
          .logout_link{
              display: none !important;
          }
          .site-logo {
            height: 22px !important;
            margin-top: 7px;
          }
          #page_wrapper.transparent_header.transparency_dark .site-header, #page_wrapper.transparent_header.transparency_dark .site-header .main-navigation a, #page_wrapper.transparent_header.transparency_dark .site-header .site-tools ul li a, #page_wrapper.transparent_header.transparency_dark .site-header .shopping_bag_items_number, #page_wrapper.transparent_header.transparency_dark .site-header .wishlist_items_number, #page_wrapper.transparent_header.transparency_dark .site-header .site-title a, #page_wrapper.transparent_header.transparency_dark .site-header .widget_product_search .search-but-added, #page_wrapper.transparent_header.transparency_dark .site-header .widget_search .search-but-added {
            color: #808080!important;
            font-size: 14px !important;
            text-transform: capitalize !important;
            font-weight: 400 !important;
            font-family: "Google Sans",Arial,sans-serif !important;

             padding: 0 4px !important;

          }
          #page_wrapper.transparent_header.transparency_dark .site-header, #page_wrapper.transparent_header.transparency_dark .site-header .main-navigation a, #page_wrapper.transparent_header.transparency_dark .site-header .site-tools ul li a, #page_wrapper.transparent_header.transparency_dark .site-header .shopping_bag_items_number, #page_wrapper.transparent_header.transparency_dark .site-header .wishlist_items_number, #page_wrapper.transparent_header.transparency_dark .site-header .site-title a, #page_wrapper.transparent_header.transparency_dark .site-header .widget_product_search .search-but-added, #page_wrapper.transparent_header.transparency_dark .site-header .widget_search .search-but-added {
            color: #808080 !important;
          }
          @media only screen and (min-width: 40.063em){
          .site-header-wrapper {
            padding: 9px 0px;
              }
          }

          .site-header, .default-navigation, .main-navigation .mega-menu > ul > li > a {
            font-size: 14px !important;
          }
          @media only screen and (max-width: 375px) and (min-width: 360px){
            .site-branding {
            width: 77px;
            margin-top: 2px;
            }
          }
          #site-top-bar {
              font-size: 14px !important;
          }

          body {
            -webkit-font-smoothing: antialiased;
          font-family: "Google Sans",Arial,sans-serif !important;
           text-rendering: optimizeLegibility;
              font-weight: 400;
          }
          p {
            -webkit-font-smoothing: antialiased;
            font-family: "Google Sans",Arial,sans-serif !important;
            text-rendering: optimizeLegibility;
          }
          h1{
          font-family: "Google Sans",Arial,sans-serif !important;
          font-weight: 300 !important
          }
          h2{
          font-family: "Google Sans",Arial,sans-serif !important;
          font-weight: 300 !important
          }
          h3{
          font-family: "Google Sans",Arial,sans-serif !important;

          }
          h4{
          font-family: "Google Sans",Arial,sans-serif !important;
          font-weight: 300 !important
          }
          a {
            -webkit-font-smoothing: antialiased;
          font-family: "Google Sans",Arial,sans-serif !important;
          }
          .boton-activar{
              background:    #0090ff;
              border:        2px solid #0090ff;
              border-radius: 4px;
              padding:       13px 45px;
              color:         #ffffff !important;
              font-size: 14px !important;
              display:       inline-block;
              text-align:    center;
              text-decoration: none;
              font-weight: bold !important;
          }
          .boton-activar:hover {
              background:    transparent;
              border:        2px solid #0090ff;
              border-radius: 4px;
              padding:       13px 45px;
              color:         #0090ff !important;
              display:       inline-block;
              text-align:    center;
              text-decoration: none;
          }
          @media(max-width: 470px){
              .container, .container-fluid {

                padding-left: 21px;
                padding-right: 21px;

            }
          }
  </style>

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <br>
        <br>
        <div class="container-fluid">
          <div class="row">

            <!-- Pie Chart -->

            <!-- Pie Chart -->
              <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <div class="row">
                        <div class="col-md-12">
                          <h6 class="m-0 font-weight-bold text-primary">Estamos a solo un paso</h6>
                        </div>
                    </div>

                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                      <div class="pb-1">
                          <div class="row">

                                <h5 style="text-align: center; color: #828186">Gracias por agendar una reunión con nuestro equipo de expertos.  </h5>





                          </div>
                          <h7>- Número de confirmación {{$evento->id}}</h7>
                          <center>
                            <table class="egt" CELLPADDING="10"	BORDER="0">
                              <tr>
                                <td><h5 class="m-0 font-weight-bold text-primary">Información de reunión</h5></td>
                                <td><h5 class="m-0 font-weight-bold text-primary">Información de cliente</h5></td>

                              </tr>
                              <tr>
                                <td>Fecha: <strong>{{$evento->date}}</strong></td>
                                <td>Nombre: <strong>{{$cliente->nombre}} {{$cliente->apellido}}</strong></td>

                              </tr>
                              <tr>
                                <td>Hora: <strong>{{date("h:i", strtotime($evento->start_date))}} - {{date("h:i", strtotime($evento->end_date))}}</strong></td>
                                <td>Teléfono: <strong>{{$cliente->telefono1}}</strong></td>
                              </tr>
                              <tr>
                                <td>Servicio: <strong>Activa tu hogar</strong></td>
                                <td>Email: <strong>{{$cliente->correo}}</strong></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>Inmobiliaria: <strong>{{$inmobiliaria->inmobiliaria}}</strong></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>Proyecto: <strong>{{$proyecto->nombre_proyecto}}</strong></td>
                              </tr>
                            </table>
                        </center>
                      </div>
                    <div class="mt-4 text-center small">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

     <!-- Logout Modal-->
     <!--div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">¿Quieres salir?</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
             </button>
           </div>
           <div class="modal-body">Se cerrará la sesión y deberás ingresar tus datos nuevamente.</div>
           <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
               <a class="btn btn-primary" href="{{ route('activaTuHogar/verificarCorreo') }}" onclick="event.preventDefault();   document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="left" title="Cerrar sesión">Salir</a>
           </div>
         </div>
       </div>
     </div-->
     <style>
     #wrapper #content-wrapper {

         background-color: transparent !important;
         width: 100%;
         overflow-x: hidden;

     }
     .fc-unthemed {
          width: 460px;
          height: auto;
          margin-left: auto;
          margin-right: auto;
      }
      body .fc {
          font-size: 13px !important;
      }
      .fc-toolbar h2 {
          text-transform: capitalize !important;
          font-size: 18px !important;
      }
      .fc-toolbar .fc-right {
          float: right;
          visibility: hidden;
      }
      .fc-day-header.fc-widget-header {
        color: #0090ffb0;
        border-style: none;
      }
      .fc-unthemed .fc-today {
        background: #0090ff;
        color:#fff;
      }
     </style>
</body>

  <!-- Bootstrap core JavaScript-->

  <script src="{{ asset('inmobiliarias/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('inmobiliarias/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('inmobiliarias/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('inmobiliarias/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('inmobiliarias/js/demo/datatables-demo.js') }}"></script>


</html>
