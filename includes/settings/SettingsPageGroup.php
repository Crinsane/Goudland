<?php

interface SettingsPageGroup {

	public function getOptionsGroup();

	public function getOptionsName();

	public function registerSettings();

	public function registerSection();

	public function registerFields();

}