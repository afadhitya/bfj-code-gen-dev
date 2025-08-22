package com.example.bookinventoryspring.service;

import com.example.bookinventoryspring.model.KodeBuku;
import com.example.bookinventoryspring.repository.KodeBukuRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class KodeBukuService {

    @Autowired
    private KodeBukuRepository kodeBukuRepository;

    public List<KodeBuku> getAllKodeBuku() {
        return kodeBukuRepository.findAllByOrderByNomorKodeBukuAsc();
    }

    public void saveKodeBuku(KodeBuku kodeBuku) {
        kodeBukuRepository.save(kodeBuku);
    }
}
