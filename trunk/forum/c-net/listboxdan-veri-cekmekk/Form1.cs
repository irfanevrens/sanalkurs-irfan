using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace listboxdan_veri_cekmekk
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            // arayacağımız ismi burada ilgili alandan alıyoruz
            string aranacakIsim = textBox1.Text;

            // kaç tane olduğunu tespit etmek için sayacımızı sıfırlıyoruz
            int sayac = 0;
           
            // listenin tüm elemanları üzerinde işlem yapmak için dönmeye başlıyoruz
            for (int i = 0; i < listBox1.Items.Count; i++)
            {
                // aradığımız isme denk geldik mi?
                if (listBox1.Items[i].ToString() == aranacakIsim)
                {
                    // evet, o halde sayacı bir artıralım
                    sayac++;
                }
            }

            // sonucu anlamlı bir şekilde labelin içine yazalım
            label3.Text = "Aranan " + aranacakIsim + " isminden " + sayac.ToString() + " adet bulundu.";
        }
    }
}
