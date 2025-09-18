<?php
defined('PREVENT_DIRECT_ACCESS') OR exit ('No direct script access allowed');

/**
 * Model: StudentsModel
 * 
 * Automatically generated via CLI.
 */
class StudentsModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function create($first_name, $last_name, $emails) {
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'emails' => $emails
        );
        return $this->db->table('students')->insert($data);
    }   

   /* public function get_one($id){
       return $this->db->table('students')->where('id', $id)->get();
    }

   public function delete($id) {
       return $this->db->table('students')->where('id', $id)->delete();
   }*/

   /*public function count_all_records()
    {
        $sql = "SELECT COUNT({$this->primary_key}) as total FROM {$this->table} WHERE 1=1";
        $result = $this->db->raw($sql);
        return $result ? $result->fetch(PDO::FETCH_ASSOC)['total'] : 0;
    }*/

    public function get_records_with_pagination($limit_clause)
    {
        $sql = "SELECT * FROM {$this->table} WHERE 1=1 ORDER BY {$this->primary_key} DESC {$limit_clause}";
        $result = $this->db->raw($sql);
        return $result ? $result->fetchAll(PDO::FETCH_ASSOC) : [];
    }

public function searchStudents(string $keyword, int $page = 1, int $per_page = 10): array
{
    $offset = ($page - 1) * $per_page;

    if (trim($keyword) !== '') {
        $kw = "%{$keyword}%";
        $sql = "SELECT id, first_name, last_name, emails, profile_pic
                FROM students
                WHERE first_name LIKE ?
                   OR last_name LIKE ?
                   OR emails LIKE ?
                ORDER BY id DESC
                LIMIT ?, ?";
        $stmt = $this->db->raw($sql, [$kw, $kw, $kw, $offset, $per_page]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $sql = "SELECT id, first_name, last_name, emails, profile_pic
                FROM students
                ORDER BY id DESC
                LIMIT ?, ?";
        $stmt = $this->db->raw($sql, [$offset, $per_page]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

public function count_filtered_records(string $keyword): int
{
    if (trim($keyword) !== '') {
        $kw = "%{$keyword}%";
        $sql = "SELECT COUNT(*) as cnt
                FROM students
                WHERE first_name LIKE ?
                   OR last_name LIKE ?
                   OR emails LIKE ?";
        $stmt = $this->db->raw($sql, [$kw, $kw, $kw]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) ($row['cnt'] ?? 0);
    } else {
        $sql = "SELECT COUNT(*) as cnt FROM students";
        $stmt = $this->db->raw($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) ($row['cnt'] ?? 0);
    }
}

public function findByUsername($username) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $this->db->raw($sql, [$username]);
    return $stmt->fetch(\PDO::FETCH_ASSOC); // ✅ fetch single row as array
}


    // Insert new user (useful if you want to register)
    public function insert1($data) {
        return $this->db->table('users')->insert($data);
    }

    public function insert($data) {
        return $this->db->table('students')->insert($data);
    }
}