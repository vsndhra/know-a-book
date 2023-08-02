<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SearchController extends Controller
{
    public function search(Request $request){
        
        $query = $request->input('book-name'); // Assuming the user enters the search query in a field named 'query'

        // Make sure the query is not empty
        if (empty($query)) {
            return response()->json(['error' => 'Please provide a search query'], 400);
        }

        // Send a request to the Google Books API with the API key
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $query,
            'maxResults' => 1, // Retrieve only the first result
            'key' => config('services.google.key'),
        ]);

        // Check if the request was successful
        if ($response->successful()) {

            $data = $response->json();
            
            // Extract the book information
            $bookInfo = $data['items'][0]['volumeInfo'] ?? null;
            
            // Check if the book information exists
            if ($bookInfo) {
                $title = $bookInfo['title'] ?? 'Unknown title';
                // $yearPublished = $bookInfo['publishedDate'] ?? 'Unknown year';
                $description = $bookInfo['description'] ?? 'No description available.';
                $author = $bookInfo['authors'][0] ?? 'Unknown author';
                
                $result = [
                    'title' => $title,
                    'author' => $author,
                    // 'yearPublished' => $yearPublished,
                    'description' => $description,
                ];

                $request->session()->flash('success', 'Your POST request was successful.');
        
                return view('content', compact('result'));

            } else {
                return response()->json(['error' => 'No results found'], 404);
            }
        } else {
            return response()->json(['error' => 'Failed to retrieve data from the Google Books API'], $response->status());
        }

        // return back()->with('status', 'add to cart successfully');

    } 
}
