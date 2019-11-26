<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TAMED Smart Living | Activa tu hogar</title>
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" type="image/ico" href="images/favicon.png" />

  <!-- Custom fonts for this template-->
  <link href="{{ asset('inmobiliarias/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('inmobiliarias/css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!--style type="text/css">
    .bg-login-image{background:url(https://at.tamed.global/inmobiliarias/img/login_ileben.png);background-position:center;background-size:cover}
  </style-->
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

<body class="">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6" style="padding-bottom: 50px; padding-top: 30px;">
                <div class="p-5">
                  <div class="text-center">
                    <img src="https://tamed.global/cl/wp-content/plugins/latepoint/public/images/steps/colors/blue/contact.png" width="150px" height="auto">
                    <p style="color: #0090ff; font-weight: bold; font-size: 18px">Ingresa tu correo</p>
                    (El correo con el que te registraste en la inmobiliaria)
                      <p style="color: #828186; font-weight: 400; font-size: 16px">Y obten los datos de acceso para poder activar tu hogar inteligente</p>
                  </div>
                  @if(session()->has('message'))
                  <form class="user" method="POST" action="{{ route('activaTuHogar/iniciarSesion') }}" >
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Tu Email..." value="{{ session()->get('correo') }}">
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Tu clave...">
                      {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group" hidden="true">
                      <input type="text" class="form-control" id="id_proyecto" name="id_proyecto"  value="{{ session()->get('id_proyecto') }}">
                    </div>
                    <div class="alert alert-success">{{ session()->get('message') }}</div>
                    <center><button type="submit" class="boton-activar">Ingresar</button></center>
                    <hr>
                    {!! $errors->first('message', '<center><span class="help-block text-danger border-bottom-danger">:message</span></center>') !!}
                  </form>
                  @else
                  <form class="user" method="POST" action="{{ route('activaTuHogar/verificarCorreo') }}" >
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Tu Email..." value="{{ old('email') }}">
                    </div>
                    <div class="form-group" hidden="true">
                      <input type="text" class="form-control" id="id_proyecto" name="id_proyecto"  value="{{ $id }}">
                    </div>
                    <center><button type="submit" class="boton-activar">Obtener contraseña</button></center>
                    {!! $errors->first('email', '<center><span class="help-block text-danger border-bottom-danger">:message</span></center>') !!}
                  </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('inmobiliarias/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('inmobiliarias/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('inmobiliarias/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('inmobiliarias/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
