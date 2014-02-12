PHPAudioEdit
============

A simple example showing how to edit audio with PHP and FFMpeg



Installing FFMpeg and FFMpeg-PHP with Appropriate Use Flags on Gentoo
---------------------------------------------------------------------

###Installing Server Libraries


####First do a dry run and list the use flags of ffmpeg and ffmpeg-php packages

`emerge -pv ffmpeg ffmpeg-php`


####Next we want to make sure we have the audio codec support that we need. Edit the portage package.use adding use flags.

`vim /etc/portage/package.use`

>media-video/ffmpeg encode aac bzip2 hardcoded-tables mmx pic zlib alsa mp3 network oss rtmp speex theora vorbis vpx x264 xvid gsm

>virtual/ffmpeg encode gsm mp3 speex theora x264

####Now install the libraries

`emerge -pv ffmpeg ffmpeg-php`

####Fix the Apache and the CLI ini files to point to the actual ffmpeg.so file (if not already correct)

/etc/php/apache2-php5.3/ext-active/ffmpeg.ini

and

/etc/php/cli-php5.3/ext-active/ffmpeg.ini

should point to `extension=/usr/lib64/php5.3/lib/extensions/no-debug-non-zts-20090626/ffmpeg.so`

####Restart Apache

`/etc/init.d/apache2`

####Make sure ffmpeg-php extensions are loaded and working

Run `php -i | grep ffmpeg'

You should see something like this in the output:

>Additional .ini files parsed => /etc/php/cli-php5.3/ext-active/ffmpeg.ini,
>ffmpeg
>ffmpeg-php version => 0.6.0-svn
>ffmpeg-php built on => Feb 11 2014 15:36:24
>ffmpeg-php gd support  => enabled
>ffmpeg libavcodec version => Lavc53.61.100
>ffmpeg libavformat version => Lavf53.32.100
>ffmpeg swscaler version => SwS2.1.100
>ffmpeg.allow_persistent => 0 => 0
>ffmpeg.show_warnings => 0 => 0

If you get errors, correct them until extensions load properly.
