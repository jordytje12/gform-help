function enqueue_custom_scripts() {
    ?>
    <style>
        .dropdown-row {
            display: flex;
            margin-bottom: 10px;
            align-items: center;
        }
        .dropdown-row .dropdown-container {
            flex: 1;
            margin-right: 10px;
        }
        .dropdown-row .dropdown-container:last-child {
            margin-right: 0;
        }
        .add-row, .remove-row {
            display: block;
            padding: 5px 10px;
            background-color: #0073aa;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        .remove-row {
            background-color: #d9534f;
            margin-left: 10px;
        }
        .dropdown-label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .total-price {
            margin-top: 10px;
            font-weight: bold;
        }
        .additional-info {
            font-size: 0.8em;
            margin-top: 5px;
        }
        .dropdown-row select:invalid {
            border: 1px solid red;
        }
    </style>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const services = {
                'banden_en_wielen': [
                    { label: 'Binnenband voor vervangen', options: { 'Goed': 25, 'Beter': 30 } },
                    { label: 'Binnenband achter vervangen', options: { 'Goed': 40, 'Beter': 45 } },
                    { label: 'Binnen- en buitenband vervangen voor', options: { 'Goed': 50, 'Beter': 60, 'Best': 70 } },
                    { label: 'Binnen- en buitenband vervangen achter', options: { 'Goed': 65, 'Beter': 75, 'Best': 85 } },
                    { label: 'Airless band vervangen voor en achter', options: { 'Goed': 250 } },
                    { label: 'Spannen en richten voorwiel', options: { 'Goed': 25 } },
                    { label: 'Spannen en richten achterwiel', options: { 'Goed': 25 } },
                    { label: 'Repareren en richten voorwiel incl. enkele spaken', options: { 'Goed': 30 } },
                    { label: 'Repareren en richten achterwiel incl. enkele spaken', options: { 'Goed': 30 } },
                    { label: 'Repareren en richten wiel incl. enkele spaken achterwiel eruit', options: { 'Goed': 50 } },
                    { label: 'Voorwiel vlechten en spannen incl. alle spaken', options: { 'Goed': 100 } },
                    { label: 'Achterwiel vlechten en spannen incl. alle spaken', options: { 'Goed': 125 } },
                    { label: 'Voorwiel vlechten en spannen incl. nw. spaken en velg', options: { 'Goed': 130 } },
                    { label: 'Achterwiel vlechten en spannen incl. nw. spaken en velg', options: { 'Goed': 150 } },
                    { label: 'Diagnose wiel of banden', options: { 'Goed': 10 } }
                ],
                'aandrijving_en_versnellingen': [
                    { label: 'Ketting spannen', options: { 'Goed': 15 } },
                    { label: 'Ketting opleggen en spannen', options: { 'Goed': 20 } },
                    { label: 'Ketting en tandwiel vervangen single speed', options: { 'Goed': 55, 'Beter': 70 } },
                    { label: 'Crankstel (aluminium) vervangen', options: { 'Goed': 55 } },
                    { label: 'Linker crank', options: { 'Goed': 30 } },
                    { label: 'Pedalen vervangen', options: { 'Goed': 25 } },
                    { label: 'Versnelling stellen', options: { 'Goed': 10 } },
                    { label: 'Versnellingskabel monteren en afstellen', options: { 'Goed': 35 } },
                    { label: 'Shifter nexus 3, 7 of 8 vervangen en afstellen', options: { 'Goed': 50 } },
                    { label: 'Trapas vervangen', options: { 'Goed': 55 } },
                    { label: 'Diagnose aandrijving - versnelling', options: { 'Goed': 10 } }
                ],
                'remmen_en_verlichting': [
                    { label: 'Remkabel voor vervangen (binnen en buiten)', options: { 'Goed': 25 } },
                    { label: 'Remkabel achter vervangen (binnen en buiten)', options: { 'Goed': 25 } },
                    { label: 'Remblokken velgrem voor vervangen', options: { 'Goed': 20 } },
                    { label: 'Remblokken velgrem achter vervangen', options: { 'Goed': 20 } },
                    { label: 'Remhendels vervangen', options: { 'Goed': 30 } },
                    { label: 'Koplamp vervangen (batterij lamp)', options: { 'Goed': 25, 'Beter': 35 } },
                    { label: 'Koplamp vervangen (naafdynamo)', options: { 'Goed': 40, 'Beter': 55 } },
                    { label: 'Achterlicht vervangen (batterij reflector)', options: { 'Goed': 15, 'Beter': 25, 'Best': 50 } },
                    { label: 'Batterij vervangen', options: { 'Goed': 7 } },
                    { label: 'Diagnose remmen - verlichting', options: { 'Goed': 10 } }
                ],
                'stuur_zadel_diverse': [
                    { label: 'Handvatten vervangen', options: { 'Goed': 10, 'Beter': 20, 'Best': 35 } },
                    { label: 'Vast ringslot vervangen (ART-2 norm)', options: { 'Goed': 30, 'Beter': 50 } },
                    { label: 'Slot doorslijpen', options: { 'Goed': 15 } },
                    { label: 'Bel vervangen', options: { 'Goed': 10 } },
                    { label: 'Snelbinders vervangen', options: { 'Goed': 15 } },
                    { label: 'Zadel vervangen', options: { 'Goed': 30, 'Beter': 50, 'Best': 90 } },
                    { label: 'Zadelstrop vervangen', options: { 'Goed': 12 } },
                    { label: 'Zadelpen vervangen', options: { 'Goed': 17, 'Beter': 42 } },
                    { label: 'Standaard vervangen', options: { 'Goed': 25 } },
                    { label: 'Dubbele standaard vervangen', options: { 'Goed': 60 } },
                    { label: 'Jasbeschermers vervangen', options: { 'Goed': 17, 'Beter': 27 } },
                    { label: 'Afstellen en diagnose balhoofd', options: { 'Goed': 10 } },
                    { label: 'Diagnose Stuur - Zadel', options: { 'Goed': 10 } }
                ],
                'overig': [
                    { label: 'Fietscomputer (montage en instellen)* met draad', options: { 'Goed': 20 } },
                    { label: 'Batterij fietscomputer vervangen * instellen', options: { 'Goed': 15 } },
                    { label: 'Diagnose overig', options: { 'Goed': 10 } }
                ],
                'beurten': [
                    { label: 'Onderhoudsbeurt Stadsfiets', options: { 'Goed': 60 } },
                    { label: 'Rijklaarmaken nieuwe fiets', options: { 'Goed': 60 } },
                    { label: 'Rijklaarmaken nieuwe fiets (in elkaar zetten uit doos)', options: { 'Goed': 85 } },
                    { label: 'Poets en beschermbeurt', options: { 'Goed': 50 } }
                ],
                'service': [
                    { label: 'Voorrijkosten', options: { 'Goed': 20 } },
                    { label: 'Schade rapport (10% van de kosten) met minimum van', options: { 'Goed': 35 } }
                ]
            };

            let totalPrice = 25; // Startprijs
            const startTarief = 25;

            function saveRows() {
                const rows = document.querySelectorAll('.dropdown-row');
                const rowsData = [];
                rows.forEach(row => {
                    const selectie1 = row.querySelector('.selectie1').value;
                    const selectie2 = row.querySelector('.selectie2').value;
                    const selectie3 = row.querySelector('.selectie3').value;
                    rowsData.push({ selectie1, selectie2, selectie3 });
                });
                localStorage.setItem('dropdownRows', JSON.stringify(rowsData));
            }

            function loadRows() {
                const savedRows = JSON.parse(localStorage.getItem('dropdownRows')) || [];
                savedRows.forEach(rowData => {
                    addNewRow(rowData);
                });
                if (savedRows.length === 0) {
                    addNewRow();
                }
                updateTotalPrice();
                updateRowButtons();
            }

            function updateSelectie2Options(selectie1Value, selectie2) {
                const options = services[selectie1Value] || [];
                
                // Clear current options
                while (selectie2.options.length > 0) {
                    selectie2.remove(0);
                }

                // Populate new options
                options.forEach(function(option, index) {
                    const newOption = document.createElement('option');
                    newOption.value = option.label;
                    newOption.textContent = option.label;
                    selectie2.appendChild(newOption);
                });

                // Trigger a change event to clear the Selectie 3 dropdown
                selectie2.dispatchEvent(new Event('change'));
            }

            function updateSelectie3Options(selectie1Value, selectie2Value, selectie3) {
                const options = services[selectie1Value]?.find(service => service.label === selectie2Value)?.options || {};
                
                // Clear current options
                while (selectie3.options.length > 0) {
                    selectie3.remove(0);
                }

                // Populate new options
                for (const [key, value] of Object.entries(options)) {
                    const newOption = document.createElement('option');
                    newOption.value = value;
                    newOption.textContent = `${key} - €${value}`;
                    selectie3.appendChild(newOption);
                }

                // Trigger a change event to update the total price
                selectie3.dispatchEvent(new Event('change'));
            }

            function updateTotalPrice() {
                const rows = document.querySelectorAll('.dropdown-row');
                totalPrice = startTarief;
                rows.forEach(row => {
                    const selectie3 = row.querySelector('.selectie3').value;
                    if (selectie3) {
                        totalPrice += parseFloat(selectie3);
                    }
                });
                const totalPriceIndicator = document.getElementById('total-price');
                totalPriceIndicator.textContent = `Totale Prijs: € ${totalPrice} (Starttarief excl. voorrijkosten)`;
            }

            function addNewRow(data = {}) {
                const container = document.getElementById('dropdown-container');
                const lastRow = container.querySelector('.dropdown-row:last-of-type');
                const newRow = lastRow.cloneNode(true);
                newRow.querySelectorAll('select').forEach(function(select) {
                    select.value = data[select.className] || '';
                    select.removeAttribute('data-old-value');
                });

                newRow.querySelector('.selectie1').addEventListener('change', function() {
                    updateSelectie2Options(this.value, newRow.querySelector('.selectie2'));
                });

                newRow.querySelector('.selectie2').addEventListener('change', function() {
                    const selectie1Value = newRow.querySelector('.selectie1').value;
                    updateSelectie3Options(selectie1Value, this.value, newRow.querySelector('.selectie3'));
                });

                newRow.querySelector('.selectie3').addEventListener('change', function() {
                    updateTotalPrice();
                });

                newRow.querySelector('.add-row').addEventListener('click', function() {
                    addNewRow();
                });

                newRow.querySelector('.remove-row').addEventListener('click', removeRow);

                lastRow.after(newRow);
                updateRowButtons();
            }

            function removeRow(event) {
                const row = event.target.closest('.dropdown-row');
                row.remove();
                updateTotalPrice();
                updateRowButtons();
            }

            function initializeRow(row) {
                row.querySelector('.selectie1').addEventListener('change', function() {
                    updateSelectie2Options(this.value, row.querySelector('.selectie2'));
                });

                row.querySelector('.selectie2').addEventListener('change', function() {
                    const selectie1Value = row.querySelector('.selectie1').value;
                    updateSelectie3Options(selectie1Value, this.value, row.querySelector('.selectie3'));
                });

                row.querySelector('.selectie3').addEventListener('change', function() {
                    updateTotalPrice();
                });

                row.querySelector('.add-row').addEventListener('click', function() {
                    addNewRow();
                });

                row.querySelector('.remove-row').addEventListener('click', removeRow);
            }

            function updateRowButtons() {
                const rows = document.querySelectorAll('.dropdown-row');
                rows.forEach((row, index) => {
                    const removeButton = row.querySelector('.remove-row');
                    if (rows.length === 1) {
                        removeButton.style.display = 'none';
                    } else {
                        removeButton.style.display = 'block';
                    }
                });
            }

            function updateHiddenFields() {
                const hiddenField = document.querySelector('input[name="selections-field"]'); // Gebruik hier de juiste name van je verborgen veld
                const rows = document.querySelectorAll('.dropdown-row');
                const selections = [];

                rows.forEach(row => {
                    const selectie1 = row.querySelector('.selectie1').value;
                    const selectie2 = row.querySelector('.selectie2').value;
                    const selectie3 = row.querySelector('.selectie3').value;
                    if (selectie1 && selectie2 && selectie3) {
                        selections.push(`${selectie1}: ${selectie2} (${selectie3})`);
                    }
                });

                hiddenField.value = selections.join('; ');
            }

            document.querySelectorAll('.dropdown-row').forEach(initializeRow);

            document.querySelector('#gform_next_button_7_12').addEventListener('click', function(event) {
                let isValid = true;
                document.querySelectorAll('.dropdown-row select').forEach(function(select) {
                    if (select.value === '') {
                        isValid = false;
                        select.style.border = '1px solid red';
                    } else {
                        select.style.border = '';
                    }
                });

                if (!isValid) {
                    event.preventDefault(); // Verhindert de standaardactie
                    alert('Alle velden moeten ingevuld zijn.');
                } else {
                    updateHiddenFields();
                    saveRows();
                }
            });

            // Load saved rows when the page loads
            loadRows();

            // Update row buttons visibility
            updateRowButtons();
        });
    </script>
    <?php
}
add_action('wp_footer', 'enqueue_custom_scripts');
