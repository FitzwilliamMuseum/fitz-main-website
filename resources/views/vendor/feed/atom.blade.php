<?php

    /* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
    '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<feed xmlns="http://www.w3.org/2005/Atom">
    @foreach($meta as $key => $metaItem)
        @if($key === 'link')
            <{{ $key }} href="{{ url($metaItem) }}" rel="self"></{{ $key }}>
        @elseif($key === 'title')
            <{{ $key }}><![CDATA[{{ $metaItem }}]]></{{ $key }}>
        @else
            <{{ $key }}>{{ $metaItem }}</{{ $key }}>
        @endif
    @endforeach
      <author>
        <name>The Fitzwilliam Museum</name>
        <email>press@fitzmuseum.cam.ac.uk</email>
      </author>
      <rights>Chancellor, Masters, and Scholars of the University of Cambridge: CC-BY</rights>
      <generator>Fitzwilliam Museum Digital Magic by DEJP3</generator>
    @foreach($items as $item)
        <entry>
            <title><![CDATA[{{ $item->title }}]]></title>
            <link rel="alternate" href="{{ url($item->link) }}" />
            <id>{{ $item->id }}</id>
            <author>
                <name><![CDATA[{{ $item->authorName }}]]></name>
            </author>
            <summary type="html">
                <![CDATA[{!! $item->summary !!}]]>
            </summary>
            <content type="html">
              <![CDATA[{!! $item->content !!}]]>
            </content>
            @if($item->__isset('enclosure'))
              <enclosure url="{{ url($item->enclosure) }}" length="{{ $item->enclosureLength }}" type="{{ $item->enclosureType }}" />
            @endif
            {{-- <category type="html">
                <![CDATA[{!! $item->category ?? '' !!}]]>
            </category> --}}
            <updated>{{  date(DATE_ATOM, strtotime($item->updated ))}}</updated>
        </entry>
    @endforeach
</feed>
