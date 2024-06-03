<?php

namespace Tests\Dev;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadBannerTest extends TestCase
{
	use RefreshDatabase;

	function test_upload_banner()
	{
		$disk = config('filesystems.default');

		Storage::fake($disk);

		$user = User::factory()->create([
			'name' => 'Adelajda Brzęczyszczykiewicz',
			'email' => uniqid() . '@gmail.com'
		]);

		$this->assertDatabaseHas('users', [
			'name' => $user->name,
			'email' => $user->email,
		]);

		$this->actingAs($user);

		$response = $this->postJson('/web/api/upload/banner', [
			'banner' => UploadedFile::fake()->image('banner.webp'),
		]);

		$response->assertStatus(422)->assertJson([
			'message' => 'The banner field has invalid image dimensions.',
		]);

		$response = $this->postJson('/web/api/upload/banner', [
			'banner' => UploadedFile::fake()->image('banner.bmp', 200, 200),
		]);

		$response->assertStatus(422)->assertJson([
			'message' => 'The banner field must be a file of type: webp, jpeg, jpg, png, gif.',
		]);

		$response = $this->postJson('/web/api/upload/banner', [
			'banner' => UploadedFile::fake()->image('banner.webp', 1920, 540),
		]);

		$response->assertStatus(200)->assertJson([
			'message' => 'Banner has been uploaded.',
			'banner' => 'banners/' . $user->id . '.webp'
		]);

		$response = $this->postJson('/web/api/upload/banner', [
			'banner' => UploadedFile::fake()->createWithContent('banner.png', file_get_contents(base_path('tests\Dev\image\fake_banner.png'))),
		]);

		$response->assertStatus(200)->assertJson([
			'message' => 'Banner has been uploaded.',
			'banner' => 'banners/' . $user->id . '.webp'
		]);

		$this->assertDatabaseHas('profiles', [
			'banner' => 'banners/' . $user->id . '.webp',
		]);

		Storage::disk($disk)->assertExists('banners/' . $user->id . '.webp');
	}
}
