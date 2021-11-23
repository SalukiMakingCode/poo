<?php

class Html
{
    public function insertCssStylesheet ($link) {
        return "<link href='".$link."' rel='stylesheet' />";
    }

    public function insertMetaDescription ($value) {
        return "<meta name='description' content='".$value."' />";
    }

    public function insertMetaViewport () {
        return "<meta name='viewport' content='width=device-width,initial-scale=1' />";
    }

    public function insertJS ($value) {
        return "<script src='".$value."'></script>";
    }

    public function link ($href, $title, $anchor) {
        return "<a href='".$href."' title='".$title."'>".$anchor."</a>";
    }

    public function img($src, $alt) {
        return "<img src='".$src."' alt='".$alt."' />";
    }

}