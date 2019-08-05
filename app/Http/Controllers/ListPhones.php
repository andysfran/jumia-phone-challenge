<?php

namespace App\Http\Controllers;

use App\PhoneFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ListPhones extends Controller
{

    /**
     * Returns the phone list with the Laravel Pagination
     * @return \Illuminate\Http\JsonResponse
     */
    public function listPhoneNumbers() {
        try {
            $country = Input::get('country');
            $status = Input::get('status');
            $phoneFactory = new PhoneFactory();

            // Get phones from DB
            $data = DB::table('customer');

            // Apply the country filter
            if ($country) {
                $data->where('phone', 'like', "%$country%");
            }
            $data = $data->paginate(10);

            // Transform the response object
            $data->getCollection()->transform(function($item) use ($phoneFactory) {
                return $phoneFactory->getPhoneInfo($item->phone);
            });

            // Filter by phone state
            $newDataCol = $data->getCollection()->filter(function($item) use ($status, $phoneFactory) {
                switch($status) {
                    case "valid":
                        return $item['isValid'];
                        break;
                    case "invalid":
                        return !$item['isValid'];
                    default:
                        return true;
                        break;
                }
            });

            // Update the collection with the new data
            $data->setCollection($newDataCol->values());

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                "error" => true,
                "data" => []
            ]);
        }
    }
}
