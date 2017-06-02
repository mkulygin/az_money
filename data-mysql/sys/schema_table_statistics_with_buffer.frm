TYPE=VIEW
query=select `pst`.`OBJECT_SCHEMA` AS `table_schema`,`pst`.`OBJECT_NAME` AS `table_name`,`pst`.`COUNT_FETCH` AS `rows_fetched`,`sys`.`format_time`(`pst`.`SUM_TIMER_FETCH`) AS `fetch_latency`,`pst`.`COUNT_INSERT` AS `rows_inserted`,`sys`.`format_time`(`pst`.`SUM_TIMER_INSERT`) AS `insert_latency`,`pst`.`COUNT_UPDATE` AS `rows_updated`,`sys`.`format_time`(`pst`.`SUM_TIMER_UPDATE`) AS `update_latency`,`pst`.`COUNT_DELETE` AS `rows_deleted`,`sys`.`format_time`(`pst`.`SUM_TIMER_DELETE`) AS `delete_latency`,`fsbi`.`count_read` AS `io_read_requests`,`sys`.`format_bytes`(`fsbi`.`sum_number_of_bytes_read`) AS `io_read`,`sys`.`format_time`(`fsbi`.`sum_timer_read`) AS `io_read_latency`,`fsbi`.`count_write` AS `io_write_requests`,`sys`.`format_bytes`(`fsbi`.`sum_number_of_bytes_write`) AS `io_write`,`sys`.`format_time`(`fsbi`.`sum_timer_write`) AS `io_write_latency`,`fsbi`.`count_misc` AS `io_misc_requests`,`sys`.`format_time`(`fsbi`.`sum_timer_misc`) AS `io_misc_latency`,`sys`.`format_bytes`(`ibp`.`allocated`) AS `innodb_buffer_allocated`,`sys`.`format_bytes`(`ibp`.`data`) AS `innodb_buffer_data`,`sys`.`format_bytes`((`ibp`.`allocated` - `ibp`.`data`)) AS `innodb_buffer_free`,`ibp`.`pages` AS `innodb_buffer_pages`,`ibp`.`pages_hashed` AS `innodb_buffer_pages_hashed`,`ibp`.`pages_old` AS `innodb_buffer_pages_old`,`ibp`.`rows_cached` AS `innodb_buffer_rows_cached` from ((`performance_schema`.`table_io_waits_summary_by_table` `pst` left join `sys`.`x$ps_schema_table_statistics_io` `fsbi` on(((`pst`.`OBJECT_SCHEMA` = `fsbi`.`table_schema`) and (`pst`.`OBJECT_NAME` = `fsbi`.`table_name`)))) left join `sys`.`x$innodb_buffer_stats_by_table` `ibp` on(((`pst`.`OBJECT_SCHEMA` = `ibp`.`object_schema`) and (`pst`.`OBJECT_NAME` = `ibp`.`object_name`)))) order by `pst`.`SUM_TIMER_WAIT` desc
md5=782eed8b8021f208dda632d926fea09d
updatable=0
algorithm=1
definer_user=mysql.sys
definer_host=localhost
suid=0
with_check_option=0
timestamp=2017-05-29 13:49:59
create-version=1
source=SELECT pst.object_schema AS table_schema, pst.object_name AS table_name, pst.count_fetch AS rows_fetched, sys.format_time(pst.sum_timer_fetch) AS fetch_latency, pst.count_insert AS rows_inserted, sys.format_time(pst.sum_timer_insert) AS insert_latency, pst.count_update AS rows_updated, sys.format_time(pst.sum_timer_update) AS update_latency, pst.count_delete AS rows_deleted, sys.format_time(pst.sum_timer_delete) AS delete_latency, fsbi.count_read AS io_read_requests, sys.format_bytes(fsbi.sum_number_of_bytes_read) AS io_read, sys.format_time(fsbi.sum_timer_read) AS io_read_latency, fsbi.count_write AS io_write_requests, sys.format_bytes(fsbi.sum_number_of_bytes_write) AS io_write, sys.format_time(fsbi.sum_timer_write) AS io_write_latency, fsbi.count_misc AS io_misc_requests, sys.format_time(fsbi.sum_timer_misc) AS io_misc_latency, sys.format_bytes(ibp.allocated) AS innodb_buffer_allocated, sys.format_bytes(ibp.data) AS innodb_buffer_data, sys.format_bytes(ibp.allocated - ibp.data) AS innodb_buffer_free, ibp.pages AS innodb_buffer_pages, ibp.pages_hashed AS innodb_buffer_pages_hashed, ibp.pages_old AS innodb_buffer_pages_old, ibp.rows_cached AS innodb_buffer_rows_cached FROM performance_schema.table_io_waits_summary_by_table AS pst LEFT JOIN x$ps_schema_table_statistics_io AS fsbi ON pst.object_schema = fsbi.table_schema AND pst.object_name = fsbi.table_name LEFT JOIN sys.x$innodb_buffer_stats_by_table AS ibp ON pst.object_schema = ibp.object_schema AND pst.object_name = ibp.object_name ORDER BY pst.sum_timer_wait DESC
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `pst`.`OBJECT_SCHEMA` AS `table_schema`,`pst`.`OBJECT_NAME` AS `table_name`,`pst`.`COUNT_FETCH` AS `rows_fetched`,`sys`.`format_time`(`pst`.`SUM_TIMER_FETCH`) AS `fetch_latency`,`pst`.`COUNT_INSERT` AS `rows_inserted`,`sys`.`format_time`(`pst`.`SUM_TIMER_INSERT`) AS `insert_latency`,`pst`.`COUNT_UPDATE` AS `rows_updated`,`sys`.`format_time`(`pst`.`SUM_TIMER_UPDATE`) AS `update_latency`,`pst`.`COUNT_DELETE` AS `rows_deleted`,`sys`.`format_time`(`pst`.`SUM_TIMER_DELETE`) AS `delete_latency`,`fsbi`.`count_read` AS `io_read_requests`,`sys`.`format_bytes`(`fsbi`.`sum_number_of_bytes_read`) AS `io_read`,`sys`.`format_time`(`fsbi`.`sum_timer_read`) AS `io_read_latency`,`fsbi`.`count_write` AS `io_write_requests`,`sys`.`format_bytes`(`fsbi`.`sum_number_of_bytes_write`) AS `io_write`,`sys`.`format_time`(`fsbi`.`sum_timer_write`) AS `io_write_latency`,`fsbi`.`count_misc` AS `io_misc_requests`,`sys`.`format_time`(`fsbi`.`sum_timer_misc`) AS `io_misc_latency`,`sys`.`format_bytes`(`ibp`.`allocated`) AS `innodb_buffer_allocated`,`sys`.`format_bytes`(`ibp`.`data`) AS `innodb_buffer_data`,`sys`.`format_bytes`((`ibp`.`allocated` - `ibp`.`data`)) AS `innodb_buffer_free`,`ibp`.`pages` AS `innodb_buffer_pages`,`ibp`.`pages_hashed` AS `innodb_buffer_pages_hashed`,`ibp`.`pages_old` AS `innodb_buffer_pages_old`,`ibp`.`rows_cached` AS `innodb_buffer_rows_cached` from ((`performance_schema`.`table_io_waits_summary_by_table` `pst` left join `sys`.`x$ps_schema_table_statistics_io` `fsbi` on(((`pst`.`OBJECT_SCHEMA` = `fsbi`.`table_schema`) and (`pst`.`OBJECT_NAME` = `fsbi`.`table_name`)))) left join `sys`.`x$innodb_buffer_stats_by_table` `ibp` on(((`pst`.`OBJECT_SCHEMA` = `ibp`.`object_schema`) and (`pst`.`OBJECT_NAME` = `ibp`.`object_name`)))) order by `pst`.`SUM_TIMER_WAIT` desc
