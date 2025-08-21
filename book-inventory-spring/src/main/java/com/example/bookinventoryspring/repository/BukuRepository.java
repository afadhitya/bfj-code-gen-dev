package com.example.bookinventoryspring.repository;

import com.example.bookinventoryspring.model.Buku;

import jakarta.transaction.Transactional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface BukuRepository extends JpaRepository<Buku, Long> {

    List<Buku> findByNamaDusOrderByJudulBukuAsc(String namaDus);

    @Query("SELECT DISTINCT b.namaDus FROM Buku b")
    List<String> findDistinctNamaDus();

    @Transactional
    @Modifying
    void deleteByNamaDus(String namaDus);
}
