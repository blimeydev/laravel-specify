<?php

it('can visit the specify homepage', function(){
    $response = $this->get('/specify');
    $response->assertStatus(200);
});

it('can visit a specify markdown page', function(){
    $response = $this->get('/specify/sample-spec/spec');
    $response->assertStatus(200);
});

it('can visit a nested markdown page', function(){
    $response = $this->get('/specify/sample-spec/checklists/requirements');
    $response->assertStatus(200);
});