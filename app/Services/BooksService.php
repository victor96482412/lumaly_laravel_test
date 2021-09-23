<?php

namespace App\Services;

class BooksService
{
    /**
     * @return string
     */
    private function getBooksFileName(): string
    {
        return storage_path() . '/app/2_Laravel_practice_LU-B_books.json';
    }

    /**
     * @return array
     */
    public function getLibrary(): array
    {
        return json_decode(file_get_contents($this->getBooksFileName()), true);
    }

    /**
     * @param array $data
     */
    public function updateLibrary(array $data)
    {
        file_put_contents($this->getBooksFileName(), json_encode($data));
    }

    /**
     * @param string $name
     * @return array
     */
    public function searchForBooks(string $name): array
    {
        $library = $this->getLibrary();
        $result = [];

        foreach ($library as $genre => $books) {
            foreach ($books as $book) {
                if (str_contains($book['name'], $name)) {
                    $result[] = $book;
                }
            }
        }
        return $result;
    }

    /**
     * @param array $data
     * @return array
     */
    public function addBook(array $data): array
    {
        $library = $this->getLibrary();
        $genre = $data['genre'];
        $name = $data['name'];
        $author = $data['author'];

        if (!isset($library[$genre])) {
            $library[$genre] = [];
        }

        $books = $library[$genre];
        $foundKey = array_search($name, array_column($books, 'name'));

        if ($foundKey !== false) {
            $books[$foundKey]['author'] = $author;
        } else {
            $books[] = [
                'name' => $name,
                'author' => $author
            ];
        }

        $library[$genre] = $books;
        $this->updateLibrary($library);

        return $library;
    }

}
