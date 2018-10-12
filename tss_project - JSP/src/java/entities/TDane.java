/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entities;

import java.io.Serializable;
import java.math.BigDecimal;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Lob;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Panda
 */
@Entity
@Table(name = "t_dane")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "TDane.findAll", query = "SELECT t FROM TDane t")
    , @NamedQuery(name = "TDane.findById", query = "SELECT t FROM TDane t WHERE t.id = :id")
    , @NamedQuery(name = "TDane.findByNr", query = "SELECT t FROM TDane t WHERE t.nr = :nr")
    , @NamedQuery(name = "TDane.findByTytul", query = "SELECT t FROM TDane t WHERE t.tytul = :tytul")
    , @NamedQuery(name = "TDane.findByOpis", query = "SELECT t FROM TDane t WHERE t.opis = :opis")
    , @NamedQuery(name = "TDane.findByKwota", query = "SELECT t FROM TDane t WHERE t.kwota = :kwota")})
public class TDane implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @NotNull
    @Column(name = "id")
    private Long id;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 50)
    @Column(name = "nr")
    private String nr;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 50)
    @Column(name = "tytul")
    private String tytul;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 255)
    @Column(name = "opis")
    private String opis;
    // @Max(value=?)  @Min(value=?)//if you know range of your decimal fields consider using these annotations to enforce field validation
    @Column(name = "kwota")
    private BigDecimal kwota;
    @Lob
    @Column(name = "obraz")
    private byte[] obraz;

    public TDane() {
    }

    public TDane(Long id) {
        this.id = id;
    }

    public TDane(Long id, String nr, String tytul, String opis) {
        this.id = id;
        this.nr = nr;
        this.tytul = tytul;
        this.opis = opis;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNr() {
        return nr;
    }

    public void setNr(String nr) {
        this.nr = nr;
    }

    public String getTytul() {
        return tytul;
    }

    public void setTytul(String tytul) {
        this.tytul = tytul;
    }

    public String getOpis() {
        return opis;
    }

    public void setOpis(String opis) {
        this.opis = opis;
    }

    public BigDecimal getKwota() {
        return kwota;
    }

    public void setKwota(BigDecimal kwota) {
        this.kwota = kwota;
    }

    public byte[] getObraz() {
        return obraz;
    }

    public void setObraz(byte[] obraz) {
        this.obraz = obraz;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (id != null ? id.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof TDane)) {
            return false;
        }
        TDane other = (TDane) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "entities.TDane[ id=" + id + " nr=" + nr + " tytul=" + tytul + " opis=" + opis + " ] \n";
    }
    
}
