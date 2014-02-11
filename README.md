PHPAudioEdit
============

A simple example showing how to edit audio with PHP and FFMpeg



Installing FFMpeg and FFMpeg-PHP with Appropriate Use Flags on Gentoo
===============================================

Installing Server Libraries
------------------------------

###First do a dry run and list the use flags of ffmpeg and ffmpeg-php packages

`emerge -pv ffmpeg ffmpeg-php`


###Next we want to make sure we have the audio codec support that we need. Edit the portage package.use adding use flags.

`vim /etc/portage/package.use`

>media-video/ffmpeg encode aac bzip2 hardcoded-tables mmx pic zlib alsa mp3 network oss rtmp speex theora vorbis vpx x264 xvid gsm

>virtual/ffmpeg encode gsm mp3 speex theora x264

###Now install the llibraries

`emerge -pv ffmpeg ffmpeg-php`

###Fix the Apache and the CLI ini files to point to the actual ffmpeg.so file (if not already correct)

/etc/php/apache2-php5.3/ext-active/ffmpeg.ini

and

/etc/php/cli-php5.3/ext-active/ffmpeg.ini

should point to `extension=/usr/lib64/php5.3/lib/extensions/no-debug-non-zts-20090626/ffmpeg.so`

###Restart Apache

`/etc/init.d/apache2
