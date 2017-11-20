<?php 

namespace App\Traits;

Trait ApiResponser
{
	private function successResponse($data, $code)
	{
		return response()->json($data, $code);
	}
	private function ErrorResponse($message, $code)
	{
		return response()->json(['error' => $message, 'code' => $code], $code);
	}
	private function showAll(Collection $collection, $code = 200)
	{
		return $this->successResponse(['data' => $collection], $code);
	}
	private function showOne(Model $instance, $code = 200)
	{
		return $this->successResponse(['data' => $instance], $code);
	}
}