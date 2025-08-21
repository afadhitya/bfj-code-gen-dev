package com.example.bookinventoryspring.repository;

import com.example.bookinventoryspring.model.KodeBuku;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface KodeBukuRepository extends JpaRepository<KodeBuku, Long> {

    List<KodeBuku> findAllByOrderByNomorKodeBukuAsc();
}
